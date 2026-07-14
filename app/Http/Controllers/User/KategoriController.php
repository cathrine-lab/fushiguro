<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('jasas')
            ->orderBy('nama_kategori', 'asc')
            ->get();

        return view('user.kategori.index', compact('kategoris'));
    }
}