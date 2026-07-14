<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index()
    {
        $kategoriPopuler = Kategori::withCount('jasas')
            ->orderByDesc('jasas_count')
            ->take(4)
            ->get();

        $jasaTerpilih = Jasa::with(['kategori', 'pemilik'])
            ->latest()
            ->take(6)
            ->get();

        $stats = [
            'users'        => Pengguna::where('role', 'user')->count(),
            'services'     => Jasa::count(),
            'transactions' => Transaksi::count(),
            'points'       => number_format(Pengguna::where('role', 'user')->sum('poin')),
        ];

        return view('public.homepage', compact(
            'kategoriPopuler', 
            'jasaTerpilih', 
            'stats'
        ));
    }
}