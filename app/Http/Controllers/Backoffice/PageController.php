<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('pages', 'public');
        }

        Page::create($validated);

        return redirect()->route('backoffice.pages.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Halaman berhasil ditambahkan',
            'notif_icon'  => 'success',
        ]);
    }

    public function show(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.show', compact('page'));
    }

    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($page->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title'], $page->id);
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('pages', 'public');
        }

        $page->update($validated);

        return redirect()->route('backoffice.pages.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Halaman berhasil diperbarui',
            'notif_icon'  => 'success',
        ]);
    }

    public function destroy(string $id)
    {
        Page::findOrFail($id)->delete();

        return redirect()->route('backoffice.pages.index')->with([
            'notif_title' => 'Berhasil',
            'notif_text'  => 'Halaman berhasil dihapus',
            'notif_icon'  => 'success',
        ]);
    }

    private function generateUniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug     = Str::slug($title);
        $original = $slug;
        $i        = 1;

        while (
            Page::where('slug', $slug)
                ->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
}