<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('jasas')->latest()->get();
        return view('admin.categories.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,nama_kategori'],
            'deskripsi'     => ['nullable', 'string'],
        ]);

        Kategori::create($request->only('nama_kategori', 'deskripsi'));

        return redirect()->route('backoffice.kategori.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Kategori berhasil ditambahkan',
            'notif_icon'  => 'success',
        ]);
    }

    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.categories.edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,nama_kategori,' . $id . ',id_kategori'],
            'deskripsi'     => ['nullable', 'string'],
        ]);

        $kategori->update($request->only('nama_kategori', 'deskripsi'));

        return redirect()->route('backoffice.kategori.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Kategori berhasil diperbarui',
            'notif_icon'  => 'success',
        ]);
    }

    public function destroy(string $id)
{
    $kategori = Kategori::withCount('jasas')->findOrFail($id);

    if ($kategori->jasas_count > 0) {
        return redirect()->route('backoffice.kategori.index')->with([
            'notif_title' => 'Gagal',
            'notif_text'  => 'Kategori tidak bisa dihapus karena masih memiliki jasa.',
            'notif_icon'  => 'error',
        ]);
    }

    $kategori->delete();

    return redirect()->route('backoffice.kategori.index')->with([
        'notif_title' => 'Berhasil',
        'notif_text'  => 'Kategori berhasil dihapus',
        'notif_icon'  => 'success',
    ]);
}
}