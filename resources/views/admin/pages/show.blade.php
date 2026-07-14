<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Detail Halaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
        .prose-content img { max-width: 100%; border-radius: 0.75rem; }
    </style>
</head>
<body class="text-gray-800">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('backoffice.pages.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div class="flex-1">
            <h1 class="text-2xl font-bold text-gray-800">Detail Halaman</h1>
            <p class="text-sm text-gray-500 mt-0.5">Mode baca — tidak bisa diedit di sini</p>
        </div>
        <a href="{{ route('backoffice.pages.edit', $page->id) }}"
           class="primary-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 hover:opacity-90 transition">
            <span class="material-symbols-outlined text-[18px]">edit</span>
            Edit Halaman
        </a>
    </div>

    <div class="max-w-4xl space-y-5">

        {{-- Meta Info --}}
        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Judul</p>
                    <p class="font-semibold text-gray-800">{{ $page->title }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Slug</p>
                    <p class="font-mono text-sm text-gray-500">{{ $page->slug }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Dibuat</p>
                    <p class="text-sm text-gray-500">{{ $page->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>

        {{-- Gambar --}}
        @if($page->image)
            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-3">Gambar</p>
                <img src="{{ Storage::url($page->image) }}" alt="{{ $page->title }}"
                     class="max-h-64 rounded-xl border border-gray-100" />
            </div>
        @endif

        {{-- Konten --}}
        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-4">Konten</p>
            <div class="prose-content prose max-w-none text-gray-700 leading-relaxed">
                {!! $page->content !!}
            </div>
        </div>

    </div>

</main>

</body>
</html>