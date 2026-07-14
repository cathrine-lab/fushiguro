<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JasaController extends Controller
{
    public function index()
    {
        $jasas = Jasa::with('kategori')
            ->where('id_pengguna', Auth::id())
            ->latest()
            ->paginate(12);

        return view('user.jasa.index', compact('jasas'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('user.jasa.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jasa'   => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
            'id_kategori' => ['required', 'exists:kategori,id_kategori'],
            'poin'        => ['required', 'integer', 'min:1'],
        ]);

        Jasa::create([
            'nama_jasa'   => $request->nama_jasa,
            'deskripsi'   => $request->deskripsi,
            'id_kategori' => $request->id_kategori,
            'id_pengguna' => Auth::id(),
            'poin'        => $request->poin,
        ]);

        return redirect()->route('user.jasa.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Jasa berhasil ditambahkan',
            'notif_icon'  => 'success',
        ]);
    }

    public function edit(string $id)
    {
        $jasa = Jasa::where('id_jasa', $id)
            ->where('id_pengguna', Auth::id())
            ->firstOrFail();

        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('user.jasa.edit', compact('jasa', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $jasa = Jasa::where('id_jasa', $id)
            ->where('id_pengguna', Auth::id())
            ->firstOrFail();

        $request->validate([
            'nama_jasa'   => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
            'id_kategori' => ['required', 'exists:kategori,id_kategori'],
            'poin'        => ['required', 'integer', 'min:1'],
        ]);

        $jasa->update($request->only('nama_jasa', 'deskripsi', 'id_kategori', 'poin'));

        return redirect()->route('user.jasa.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Jasa berhasil diperbarui',
            'notif_icon'  => 'success',
        ]);
    }

    public function destroy(string $id)
    {
        $jasa = Jasa::where('id_jasa', $id)
            ->where('id_pengguna', Auth::id())
            ->firstOrFail();

        $jasa->delete();

        return redirect()->route('user.jasa.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Jasa berhasil dihapus',
            'notif_icon'  => 'success',
        ]);
    }

    public function browse(Request $request)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        $query = Jasa::with(['kategori', 'pemilik', 'transaksi.ulasan']);

        if ($request->filled('cari')) {
            $searchTerm = $request->cari;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama_jasa', 'like', '%' . $searchTerm . '%')
                  ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        $jasas = $query->latest()->paginate(12)->appends($request->query());

        return view('user.jasa.browse', compact('jasas', 'kategoris'));
    }

    public function show(string $id)
{
    $jasa = Jasa::with([
        'kategori', 
        'pemilik', 
        'transaksi' => function($query) {
            $query->where('status', 'selesai')->with(['ulasan.pengguna']);
        }
    ])->findOrFail($id);

    $avgRating = $jasa->transaksi->flatMap->ulasan->avg('rating') ?? 0;
    $totalUlasan = $jasa->transaksi->flatMap->ulasan->count();
    $ulasanList = $jasa->transaksi->flatMap->ulasan->sortByDesc('created_at');

    return view('user.jasa.show', compact('jasa', 'avgRating', 'totalUlasan', 'ulasanList'));
}

}