<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Ulasan;

class ProfilePublicController extends Controller
{
    public function show(string $id)
    {
        $pengguna = Pengguna::with(['jasa.kategori'])->where('role', 'user')->findOrFail($id);

        $transaksiSelesai = \App\Models\Transaksi::where('id_penyedia_jasa', $pengguna->id_pengguna)
            ->where('status', 'selesai')
            ->count();

        $avgRating = Ulasan::whereHas('transaksi', function ($q) use ($pengguna) {
            $q->where('id_penyedia_jasa', $pengguna->id_pengguna);
        })->avg('rating');

        $ulasanTerbaru = Ulasan::with(['pengguna', 'transaksi.jasa'])
            ->whereHas('transaksi', function ($q) use ($pengguna) {
                $q->where('id_penyedia_jasa', $pengguna->id_pengguna);
            })
            ->latest()
            ->take(5)
            ->get();

        $totalUlasan = Ulasan::whereHas('transaksi', function ($q) use ($pengguna) {
            $q->where('id_penyedia_jasa', $pengguna->id_pengguna);
        })->count();

        return view('user.profile', compact(
            'pengguna',
            'transaksiSelesai',
            'avgRating',
            'ulasanTerbaru',
            'totalUlasan',
        ));
    }
}