<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Daftar semua transaksi milik user
     */
    public function index()
    {
        $user = Auth::user();

        $sebagaiPenerima = Transaksi::with(['jasa', 'penyedia'])
            ->where('id_penerima_jasa', $user->id_pengguna)
            ->latest()
            ->get();

        $sebagaiPenyedia = Transaksi::with(['jasa', 'penerima'])
            ->where('id_penyedia_jasa', $user->id_pengguna)
            ->latest()
            ->get();

        return view('user.transaksi.index', compact('sebagaiPenerima', 'sebagaiPenyedia'));
    }

    /**
     * Form request jasa
     */
    public function create(Request $request)
    {
        $jasa = Jasa::with('pemilik')->findOrFail($request->id_jasa);

        if ($jasa->id_pengguna === Auth::id()) {
            return redirect()->route('user.jasa.browse')
                ->with('error', 'Kamu tidak bisa merequest jasa milikmu sendiri.');
        }

        $user = Auth::user();
        $cukupPoin = $user->poin >= $jasa->poin;

        return view('user.transaksi.create', compact('jasa', 'cukupPoin'));
    }

    /**
     * Simpan request transaksi baru (FIXED FOR ORACLE)
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_jasa'     => ['required', 'exists:jasa,id_jasa'],
            'jumlah_poin' => ['required', 'integer', 'min:1'],
            'catatan'     => ['nullable', 'string', 'max:1000'],
        ]);

        $jasa = Jasa::findOrFail($request->id_jasa);
        $user = Auth::user();

        // 1. Validasi saldo poin
        if ($user->poin < $jasa->poin) {
            return back()->withInput()->withErrors([
                'jumlah_poin' => 'Saldo poin tidak mencukupi. Saldo saat ini: ' . number_format($user->poin) . ' Pts, Harga jasa: ' . number_format($jasa->poin) . ' Pts.'
            ]);
        }

        // 2. Validasi tidak bisa request jasa sendiri
        if ($jasa->id_pengguna === $user->id_pengguna) {
            return back()->withErrors(['id_jasa' => 'Tidak bisa merequest jasa milik Anda sendiri.']);
        }

        // 3. PERBAIKAN ORACLE: Kurangi poin DULU di luar transaction create
        // Menggunakan update manual agar lebih stabil daripada decrement() di dalam transaction
        Pengguna::where('id_pengguna', $user->id_pengguna)
            ->update(['poin' => $user->poin - $jasa->poin]);

        // Refresh instance user agar data poin terbaru terbaca di memori
        $user->refresh();

        // 4. Buat transaksi (tanpa dibungkus transaction bersama decrement)
        $transaksi = Transaksi::create([
            'id_jasa'           => $jasa->id_jasa,
            'id_penerima_jasa'  => $user->id_pengguna,
            'id_penyedia_jasa'  => $jasa->id_pengguna,
            'jumlah_poin'       => $jasa->poin,
            'catatan'           => $request->catatan,
            'status'            => 'pending',
            'tgl_transaksi'     => now(),
        ]);

        return redirect()->route('user.transaksi.show', $transaksi->id_transaksi)
            ->with([
                'notif_title' => 'Request Berhasil!',
                'notif_text'  => 'Poin telah di-hold. Menunggu konfirmasi penyedia.',
                'notif_icon'  => 'success'
            ]);
    }

    /**
     * Detail transaksi
     */
    public function show(string $id)
    {
        $user = Auth::user();
        
        // Load relasi lengkap termasuk ulasan.pengguna untuk menampilkan nama reviewer
        $transaksi = Transaksi::with(['jasa.kategori', 'penyedia', 'penerima', 'ulasan'])
            ->where(function ($q) use ($user) {
                $q->where('id_penyedia_jasa', $user->id_pengguna)
                  ->orWhere('id_penerima_jasa', $user->id_pengguna);
            })
            ->findOrFail($id);

        return view('user.transaksi.show', compact('transaksi'));
    }

    /**
     * Update status transaksi
     */
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'in:proses,selesai,dibatalkan'],
        ]);

        $user = Auth::user();
        $transaksi = Transaksi::with(['penyedia', 'penerima'])
            ->where(function ($q) use ($user) {
                $q->where('id_penyedia_jasa', $user->id_pengguna)
                  ->orWhere('id_penerima_jasa', $user->id_pengguna);
            })
            ->findOrFail($id);

        $newStatus = $request->status;
        $isPenyedia = $transaksi->id_penyedia_jasa == $user->id_pengguna; // Gunakan == untuk hindari strict type issue
        $isPenerima = $transaksi->id_penerima_jasa == $user->id_pengguna;

        // Validasi siapa yang boleh ubah ke status apa
        $allowed = match($newStatus) {
            'proses'     => $isPenyedia && $transaksi->status === 'pending',
            'selesai'    => $isPenyedia && $transaksi->status === 'proses',
            'dibatalkan' => ($isPenyedia || $isPenerima) && $transaksi->status === 'pending',
            default      => false,
        };

        if (!$allowed) {
            return back()->withErrors(['status' => 'Perubahan status tidak diizinkan.']);
        }

        DB::transaction(function () use ($transaksi, $newStatus) {
            $transaksi->update(['status' => $newStatus]);

            if ($newStatus === 'selesai') {
                // Transfer poin ke penyedia
                $transaksi->penyedia->increment('poin', $transaksi->jumlah_poin);
                
                // Catat tanggal selesai
                $transaksi->update(['tgl_selesai' => now()]);
            } 
            elseif ($newStatus === 'dibatalkan') {
                // PERBAIKAN ORACLE: Kembalikan poin menggunakan update manual
                Pengguna::where('id_pengguna', $transaksi->id_penerima_jasa)
                    ->increment('poin', $transaksi->jumlah_poin);
            }
        });

        $pesan = match($newStatus) {
            'proses'     => 'Transaksi diterima! Segera kerjakan.',
            'selesai'    => 'Transaksi selesai! Poin berhasil ditransfer.',
            'dibatalkan' => 'Transaksi dibatalkan. Poin telah dikembalikan.',
        };

        return redirect()->route('user.transaksi.show', $transaksi->id_transaksi)->with([
            'notif_title' => 'Status Diperbarui',
            'notif_text'  => $pesan,
            'notif_icon'  => $newStatus === 'dibatalkan' ? 'warning' : 'success',
        ]);
    }
}