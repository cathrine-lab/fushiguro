<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Transaksi;
use App\Models\Ulasan;
use Illuminate\Support\Carbon; // ← Tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengguna  = Pengguna::where('role', 'user')->count();
        $totalJasa      = Jasa::count();
        $totalTransaksi = Transaksi::count();
        $totalPoinBeredar = Pengguna::where('role', 'user')->sum('poin');

        $transaksiPerStatus = [
            'pending'    => Transaksi::where('status', 'pending')->count(),
            'proses'     => Transaksi::where('status', 'proses')->count(),
            'selesai'    => Transaksi::where('status', 'selesai')->count(),
            'dibatalkan' => Transaksi::where('status', 'dibatalkan')->count(),
        ];

        $transaksiTerbaru = Transaksi::with(['jasa', 'penyedia', 'penerima'])
            ->latest()
            ->take(8)
            ->get()
            ->map(function ($t) {
                $t->tgl_transaksi = Carbon::parse($t->tgl_transaksi);
                return $t;
            });

        $penggunaTerbaru = Pengguna::where('role', 'user')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($p) {
                $p->created_at = Carbon::parse($p->created_at);
                return $p;
            });

        $kategoriPopuler = Kategori::withCount('jasas')
            ->orderByDesc('jasas_count')
            ->take(5)
            ->get();

        $avgRatingPlatform = Ulasan::avg('rating');

        return view('admin.dashboard', compact(
            'totalPengguna',
            'totalJasa',
            'totalTransaksi',
            'totalPoinBeredar',
            'transaksiPerStatus',
            'transaksiTerbaru',
            'penggunaTerbaru',
            'kategoriPopuler',
            'avgRatingPlatform',
        ));
    }
}