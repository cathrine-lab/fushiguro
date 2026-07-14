<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function create($id_transaksi)
    {
        $transaksi = Transaksi::with(['jasa', 'penyedia'])
            ->where('id_transaksi', $id_transaksi)
            ->where('id_penerima_jasa', Auth::id())
            ->where('status', 'selesai')
            ->firstOrFail();

        // Cek apakah sudah pernah review
        $sudahReview = Ulasan::where('id_transaksi', $id_transaksi)->exists();

        if ($sudahReview) {
            return back()->with([
                'notif_title' => 'Info',
                'notif_text' => 'Kamu sudah memberikan ulasan untuk transaksi ini.',
                'notif_icon' => 'info'
            ]);
        }

        return view('user.ulasan.create', compact('transaksi'));
    }

    public function store(Request $request, $id_transaksi)
    {
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'komentar' => ['nullable', 'string', 'max:1000']
        ]);

        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)
            ->where('id_penerima_jasa', Auth::id())
            ->where('status', 'selesai')
            ->firstOrFail();

        // Cek duplikat
        $sudahReview = Ulasan::where('id_transaksi', $id_transaksi)->exists();
        if ($sudahReview) {
            return back()->withErrors(['rating' => 'Kamu sudah memberikan ulasan untuk transaksi ini.']);
        }

        Ulasan::create([
            'id_transaksi' => $id_transaksi,
            'id_pengguna' => Auth::id(),
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        return redirect()->route('user.transaksi.show', $id_transaksi)
            ->with([
                'notif_title' => 'Ulasan Terkirim!',
                'notif_text' => 'Terima kasih atas feedback kamu.',
                'notif_icon' => 'success'
            ]);
    }
}