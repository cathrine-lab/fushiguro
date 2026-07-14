<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::where('role', 'user')
            ->withCount(['jasa', 'transaksiSebagaiPenyedia', 'transaksiSebagaiPenerima'])
            ->latest()
            ->get();

        return view('admin.pengguna.index', compact('penggunas'));
    }

    public function show(string $id)
    {
        $pengguna = Pengguna::with(['jasa.kategori'])->findOrFail($id);

        $transaksiSelesai = \App\Models\Transaksi::where(function ($q) use ($id) {
            $q->where('id_penyedia_jasa', $id)->orWhere('id_penerima_jasa', $id);
        })->where('status', 'selesai')->count();

        $avgRating = \App\Models\Ulasan::whereHas('transaksi', function ($q) use ($id) {
            $q->where('id_penyedia_jasa', $id);
        })->avg('rating');

        return view('admin.pengguna.show', compact('pengguna', 'transaksiSelesai', 'avgRating'));
    }

    // Tambah / kurangi poin
    public function updatePoin(Request $request, string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'jumlah' => ['required', 'integer', 'min:1'],
            'aksi'   => ['required', 'in:tambah,kurangi'],
        ]);

        if ($request->aksi === 'tambah') {
            $pengguna->increment('poin', $request->jumlah);
            $pesan = "Berhasil menambah {$request->jumlah} poin ke {$pengguna->nama}.";
        } else {
            if ($pengguna->poin < $request->jumlah) {
                return back()->withErrors(['jumlah' => 'Poin pengguna tidak cukup untuk dikurangi.']);
            }
            $pengguna->decrement('poin', $request->jumlah);
            $pesan = "Berhasil mengurangi {$request->jumlah} poin dari {$pengguna->nama}.";
        }

        return back()->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => $pesan,
            'notif_icon'  => 'success',
        ]);
    }

    // Reset password pengguna
    public function resetPassword(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update(['password' => Hash::make('password123')]);

        return back()->with([
            'notif_title' => 'Password Direset',
            'notif_text'  => "Password {$pengguna->nama} direset ke 'password123'.",
            'notif_icon'  => 'info',
        ]);
    }

    // Hapus pengguna
    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        if ($pengguna->role === 'admin') {
            return redirect()->route('backoffice.pengguna.index')->with([
                'notif_title' => 'Gagal',
                'notif_text'  => 'Akun admin tidak bisa dihapus.',
                'notif_icon'  => 'error',
            ]);
        }

        $pengguna->delete();

        return redirect()->route('backoffice.pengguna.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Pengguna berhasil dihapus.',
            'notif_icon'  => 'success',
        ]);
    }
}