<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Edit Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
    </style>
</head>
<body class="text-gray-800">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('backoffice.kategori.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Kategori</h1>
            <p class="text-sm text-gray-500 mt-0.5">Perbarui data kategori</p>
        </div>
    </div>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <form action="{{ route('backoffice.kategori.update', $kategori->id_kategori) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="nama_kategori">
                        Nama Kategori <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_kategori" name="nama_kategori"
                           value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('nama_kategori') border-red-400 @enderror"
                           required />
                    @error('nama_kategori')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="deskripsi">
                        Deskripsi <span class="text-gray-400 font-normal">(opsional)</span>
                    </label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                              class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 resize-none">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="primary-gradient text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:opacity-90 transition">
                        Perbarui Kategori
                    </button>
                    <a href="{{ route('backoffice.kategori.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-semibold transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</main>

</body>
</html>