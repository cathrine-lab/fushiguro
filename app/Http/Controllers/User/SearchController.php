<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q', '');

        $jasas     = collect();
        $penggunas = collect();
        $kategoris = collect();

        if (strlen($query) >= 2) {
            $jasas = Jasa::with(['kategori', 'pemilik'])
                ->where('id_pengguna', '!=', Auth::id())
                ->where(function ($q) use ($query) {
                    $q->where('nama_jasa', 'like', "%{$query}%")
                      ->orWhere('deskripsi', 'like', "%{$query}%");
                })
                ->latest()
                ->take(10)
                ->get();

            $penggunas = Pengguna::where('role', 'user')
                ->where('id_pengguna', '!=', Auth::id())
                ->where(function ($q) use ($query) {
                    $q->where('nama', 'like', "%{$query}%")
                      ->orWhere('email', 'like', "%{$query}%");
                })
                ->take(5)
                ->get();

            $kategoris = Kategori::where('nama_kategori', 'like', "%{$query}%")
                ->withCount('jasas')
                ->take(5)
                ->get();
        }

        $total = $jasas->count() + $penggunas->count() + $kategoris->count();

        return view('user.search', compact('query', 'jasas', 'penggunas', 'kategoris', 'total'));
    }
}