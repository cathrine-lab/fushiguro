<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Detail Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
    </style>
</head>
<body class="text-gray-800">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('backoffice.pengguna.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Detail Pengguna</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Profil & Poin --}}
        <div class="space-y-5">

            {{-- Card Profil --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-6 text-center">
                <div class="w-20 h-20 rounded-full primary-gradient flex items-center justify-center text-white font-bold text-3xl mx-auto mb-4">
                    {{ strtoupper(substr($pengguna->nama, 0, 1)) }}
                </div>
                <h2 class="text-lg font-bold text-gray-800">{{ $pengguna->nama }}</h2>
                <p class="text-sm text-gray-500">{{ $pengguna->email }}</p>
                @if($pengguna->no_hp)
                    <p class="text-sm text-gray-500 mt-1">{{ $pengguna->no_hp }}</p>
                @endif
                @if($pengguna->alamat)
                    <p class="text-xs text-gray-400 mt-2">{{ $pengguna->alamat }}</p>
                @endif
                <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-3 gap-2 text-center">
                    <div>
                        <p class="text-xl font-bold text-indigo-600">{{ $pengguna->poin }}</p>
                        <p class="text-xs text-gray-400">Poin</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-purple-600">{{ $transaksiSelesai }}</p>
                        <p class="text-xs text-gray-400">Selesai</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-yellow-600">{{ $avgRating ? number_format($avgRating, 1) : '-' }}</p>
                        <p class="text-xs text-gray-400">Rating</p>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mt-4">Bergabung {{ $pengguna->created_at->format('d M Y') }}</p>
            </div>

            {{-- Kelola Poin --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5">
                <h3 class="font-bold text-gray-800 mb-4">Kelola Poin</h3>
                <form action="{{ route('backoffice.pengguna.updatePoin', $pengguna->id_pengguna) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-1">Jumlah Poin</label>
                        <input type="number" name="jumlah" min="1" placeholder="contoh: 100"
                               class="w-full border border-gray-300 rounded-xl px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('jumlah') border-red-400 @enderror"
                               required />
                        @error('jumlah')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" name="aksi" value="tambah"
                                class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2 rounded-xl text-sm font-semibold transition">
                            + Tambah
                        </button>
                        <button type="submit" name="aksi" value="kurangi"
                                class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl text-sm font-semibold transition">
                            − Kurangi
                        </button>
                    </div>
                </form>
            </div>

            {{-- Reset Password --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5">
                <h3 class="font-bold text-gray-800 mb-2">Reset Password</h3>
                <p class="text-xs text-gray-400 mb-4">Password akan direset ke <strong>password123</strong></p>
                <form action="{{ route('backoffice.pengguna.resetPassword', $pengguna->id_pengguna) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="button" onclick="confirmReset()"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-xl text-sm font-semibold transition">
                        Reset Password
                    </button>
                </form>
            </div>

        </div>

        {{-- Jasa Milik Pengguna --}}
        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-800 mb-4">
                    Jasa yang Diposting
                    <span class="ml-2 text-sm font-normal text-gray-400">({{ $pengguna->jasa->count() }})</span>
                </h3>

                @if($pengguna->jasa->isEmpty())
                    <div class="text-center py-10 text-gray-400">
                        <span class="material-symbols-outlined text-[40px]">design_services</span>
                        <p class="text-sm mt-2">Belum ada jasa yang diposting</p>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach($pengguna->jasa as $jasa)
                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl">
                                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0">
                                    <span class="material-symbols-outlined text-[20px]">design_services</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-800">{{ $jasa->nama_jasa }}</p>
                                    <p class="text-xs text-gray-400 mt-0.5">{{ $jasa->kategori->nama_kategori }}</p>
                                    <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $jasa->deskripsi }}</p>
                                </div>
                                <span class="text-xs text-gray-400 flex-shrink-0">{{ $jasa->created_at->format('d M Y') }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

</main>

<script>
    function confirmReset() {
        Swal.fire({
            title: 'Reset Password?',
            text: "Password akan diganti ke 'password123'",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f97316',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, reset!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('form[action*="resetPassword"]').submit();
            }
        });
    }

    @if(session('notif_title'))
        Swal.fire({
            title: "{{ session('notif_title') }}",
            text: "{{ session('notif_text') }}",
            icon: "{{ session('notif_icon') }}",
            confirmButtonText: 'OK'
        });
    @endif
</script>

</body>
</html>