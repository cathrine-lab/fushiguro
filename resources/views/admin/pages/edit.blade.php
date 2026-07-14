<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Edit Halaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
        .note-editor { border-color: #d1d5db !important; border-radius: 0.75rem !important; }
    </style>
</head>
<body class="text-gray-800">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('backoffice.pages.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Halaman</h1>
            <p class="text-sm text-gray-500 mt-0.5">Perbarui konten halaman</p>
        </div>
    </div>

    <div class="max-w-4xl">
        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <form action="{{ route('backoffice.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="title">
                        Judul <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('title') border-red-400 @enderror"
                           required autofocus />
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="content">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content" name="content" class="texteditor w-full">{{ old('content', $page->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Gambar <span class="text-gray-400 font-normal">(kosongkan jika tidak ingin diubah)</span>
                    </label>
                    @if($page->image)
                        <div class="mb-3">
                            <p class="text-xs text-gray-400 mb-1">Gambar saat ini:</p>
                            <img src="{{ Storage::url($page->image) }}" alt="Gambar saat ini"
                                 class="max-h-40 rounded-xl border border-gray-200" />
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition cursor-pointer" />
                    <img id="preview-image" src="#" alt="Preview" class="hidden mt-3 max-h-48 rounded-xl border border-gray-200" />
                    @error('image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2 border-t border-gray-100">
                    <button type="submit"
                            class="primary-gradient text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('backoffice.pages.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-semibold transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $('.texteditor').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });

    document.getElementById('image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview-image');
        if (file) {
            const reader = new FileReader();
            reader.onload = (ev) => { preview.src = ev.target.result; preview.classList.remove('hidden'); };
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>