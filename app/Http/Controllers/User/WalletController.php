<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalEarned = Transaksi::where('id_penyedia_jasa', $user->id_pengguna)
            ->where('status', 'selesai')
            ->sum('jumlah_poin');

        $totalSpent = Transaksi::where('id_penerima_jasa', $user->id_pengguna)
            ->where('status', 'selesai')
            ->sum('jumlah_poin');

        $riwayat = Transaksi::with(['jasa', 'penyedia', 'penerima'])
            ->where(function ($q) use ($user) {
                $q->where('id_penyedia_jasa', $user->id_pengguna)
                  ->orWhere('id_penerima_jasa', $user->id_pengguna);
            })
            ->latest()
            ->paginate(10);

        return view('user.wallet', compact('user', 'totalEarned', 'totalSpent', 'riwayat'));
    }
}