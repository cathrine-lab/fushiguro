<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\Transaksi;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jasasSaya = Jasa::with(['kategori', 'transaksi.ulasan'])
            ->where('id_pengguna', $user->id_pengguna)
            ->latest()
            ->take(4)
            ->get();

        $totalJasa = Jasa::where('id_pengguna', $user->id_pengguna)->count();

        $activeTransaksi = Transaksi::with(['jasa', 'penyedia'])
            ->where('id_penerima_jasa', $user->id_pengguna)
            ->whereIn('status', ['pending', 'proses'])
            ->latest()
            ->take(5)
            ->get();

        $completedCount = Transaksi::where(function ($q) use ($user) {
            $q->where('id_penerima_jasa', $user->id_pengguna)
              ->orWhere('id_penyedia_jasa', $user->id_pengguna);
        })
        ->where('status', 'selesai')
        ->count();

        $avgRating = Ulasan::whereHas('transaksi', function ($q) use ($user) {
            $q->where('id_penyedia_jasa', $user->id_pengguna);
        })->avg('rating');

        $recentActivity = Transaksi::with(['jasa', 'penerima', 'penyedia', 'ulasan'])
            ->where(function ($q) use ($user) {
                $q->where('id_penyedia_jasa', $user->id_pengguna)
                  ->orWhere('id_penerima_jasa', $user->id_pengguna);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('user.dashboard', compact(
            'user',
            'jasasSaya',
            'totalJasa',
            'activeTransaksi',
            'completedCount',
            'avgRating',
            'recentActivity',
        ));
    }
}