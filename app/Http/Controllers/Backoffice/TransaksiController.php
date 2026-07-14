<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['jasa', 'penyedia', 'penerima']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $transaksis = $query->latest()->get();

        $stats = [
            'pending'    => Transaksi::where('status', 'pending')->count(),
            'proses'     => Transaksi::where('status', 'proses')->count(),
            'selesai'    => Transaksi::where('status', 'selesai')->count(),
            'dibatalkan' => Transaksi::where('status', 'dibatalkan')->count(),
            'total'      => Transaksi::count(),
            'total_poin' => Transaksi::where('status', 'selesai')->sum('jumlah_poin'),
        ];

        return view('admin.transaksi.index', compact('transaksis', 'stats'));
    }

    public function show(string $id)
    {
        $transaksi = Transaksi::with(['jasa.kategori', 'penyedia', 'penerima', 'ulasan.pengguna'])
            ->findOrFail($id);

        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Admin memverifikasi/mengubah status transaksi
     * Menangani: Terima & Proses, Tandai Selesai, Batalkan
     */
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'in:proses,selesai,dibatalkan'],
        ]);

        $transaksi = Transaksi::with(['penyedia', 'penerima'])->findOrFail($id);
        $newStatus = $request->status;

        // Validasi transisi status yang diizinkan untuk Admin
        $allowed = match($newStatus) {
            'proses'     => in_array($transaksi->status, ['pending']),
            'selesai'    => in_array($transaksi->status, ['pending', 'proses']),
            'dibatalkan' => in_array($transaksi->status, ['pending', 'proses']),
            default      => false,
        };

        if (!$allowed) {
            return back()->withErrors(['status' => 'Transisi status tidak valid.']);
        }

        DB::transaction(function () use ($transaksi, $newStatus) {
            $transaksi->update(['status' => $newStatus]);

            if ($newStatus === 'selesai') {
                // Transfer poin ke penyedia (poin penerima sudah di-hold saat request)
                Pengguna::where('id_pengguna', $transaksi->id_penyedia_jasa)
                    ->increment('poin', $transaksi->jumlah_poin);
                
                $transaksi->update(['tgl_selesai' => now()]);
            } 
            elseif ($newStatus === 'dibatalkan') {
                // Kembalikan poin ke penerima jika dibatalkan
                Pengguna::where('id_pengguna', $transaksi->id_penerima_jasa)
                    ->increment('poin', $transaksi->jumlah_poin);
            }
        });

        $pesan = match($newStatus) {
            'proses'     => 'Transaksi diterima dan sedang dikerjakan.',
            'selesai'    => 'Transaksi selesai! Poin telah ditransfer ke penyedia.',
            'dibatalkan' => 'Transaksi dibatalkan. Poin telah dikembalikan ke penerima.',
        };

        return back()->with([
            'notif_title' => 'Status Diperbarui',
            'notif_text'  => $pesan,
            'notif_icon'  => $newStatus === 'dibatalkan' ? 'warning' : 'success',
        ]);
    }
}