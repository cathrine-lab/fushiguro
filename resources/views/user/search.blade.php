<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tukar Jasa - Pencarian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
    </style>
</head>
<body class="text-gray-800">

@include('user.partials.sidebar')

<main class="md:ml-[280px] min-h-screen">
    @include('user.partials.header', ['title' => 'Pencarian'])

    <div class="p-6 md:p-10 space-y-8">

        {{-- Search Bar --}}
        <form method="GET" action="{{ route('user.search') }}" class="relative max-w-2xl">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">search</span>
            <input type="text" name="q" value="{{ $query }}"
                   placeholder="Cari jasa, pengguna, atau kategori..."
                   autofocus
                   class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 shadow-sm"
                   id="searchInput" />
            @if($query)
                <a href="{{ route('user.search') }}"
                   class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </a>
            @endif
        </form>

        {{-- Belum ada query --}}
        @if(strlen($query) < 2)
            <div class="max-w-2xl">
                <p class="text-sm text-gray-400 mb-6">Ketik minimal 2 karakter untuk mulai mencari.</p>

                {{-- Shortcut Kategori --}}
                @php $kategoris = \App\Models\Kategori::withCount('jasas')->orderByDesc('jasas_count')->take(8)->get(); @endphp
                @if($kategoris->isNotEmpty())
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Kategori Populer</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($kategoris as $kat)
                                <a href="{{ route('user.search', ['q' => $kat->nama_kategori]) }}"
                                   class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium text-gray-700 hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-700 transition">
                                    {{ $kat->nama_kategori }}
                                    <span class="ml-1 text-xs text-gray-400">({{ $kat->jasas_count }})</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

        {{-- Ada query tapi tidak ada hasil --}}
        @elseif($total === 0)
            <div class="flex flex-col items-center py-16 text-gray-400">
                <span class="material-symbols-outlined text-[64px] mb-4">search_off</span>
                <p class="text-lg font-semibold text-gray-600">Tidak ada hasil untuk "{{ $query }}"</p>
                <p class="text-sm mt-1">Coba kata kunci lain atau cek ejaannya</p>
            </div>

        {{-- Ada hasil --}}
        @else
            <p class="text-sm text-gray-500">
                Ditemukan <span class="font-semibold text-gray-800">{{ $total }}</span> hasil untuk
                "<span class="font-semibold text-indigo-600">{{ $query }}</span>"
            </p>

            {{-- Hasil Jasa --}}
            @if($jasas->isNotEmpty())
                <div>
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-indigo-500">design_services</span>
                        Jasa
                        <span class="text-sm font-normal text-gray-400">({{ $jasas->count() }})</span>
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($jasas as $jasa)
                            <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}"
                               class="bg-white rounded-2xl border border-gray-200 p-5 flex flex-col gap-3 hover:shadow-md hover:-translate-y-0.5 transition-all">
                                <div class="flex items-start justify-between">
                                    <div class="w-11 h-11 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 flex-shrink-0">
                                        <span class="material-symbols-outlined">design_services</span>
                                    </div>
                                    <span class="text-xs font-medium bg-purple-100 text-purple-700 px-2.5 py-1 rounded-full">
                                        {{ $jasa->kategori->nama_kategori }}
                                    </span>
                                </div>
                                <div>
                                    {{-- Highlight kata kunci --}}
                                    <h3 class="font-semibold text-gray-800 text-sm">
                                        {!! preg_replace('/(' . preg_quote($query, '/') . ')/i', '<mark class="bg-yellow-100 text-yellow-800 rounded px-0.5">$1</mark>', e($jasa->nama_jasa)) !!}
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $jasa->deskripsi }}</p>
                                </div>
                                <div class="flex items-center gap-2 mt-auto pt-2 border-t border-gray-100">
                                    <div class="w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold">
                                        {{ strtoupper(substr($jasa->pemilik->nama, 0, 1)) }}
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $jasa->pemilik->nama }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Hasil Pengguna --}}
            @if($penggunas->isNotEmpty())
                <div>
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-purple-500">person</span>
                        Pengguna
                        <span class="text-sm font-normal text-gray-400">({{ $penggunas->count() }})</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($penggunas as $p)
                            <a href="{{ route('user.profil.show', $p->id_pengguna) }}"
                               class="bg-white rounded-2xl border border-gray-200 p-4 flex items-center gap-4 hover:shadow-md hover:-translate-y-0.5 transition-all">
                                <div class="w-12 h-12 rounded-full primary-gradient flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                    {{ strtoupper(substr($p->nama, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-800 text-sm truncate">
                                        {!! preg_replace('/(' . preg_quote($query, '/') . ')/i', '<mark class="bg-yellow-100 text-yellow-800 rounded px-0.5">$1</mark>', e($p->nama)) !!}
                                    </p>
                                    <p class="text-xs text-gray-400 truncate">{{ $p->email }}</p>
                                    <p class="text-xs text-indigo-600 font-semibold mt-0.5">{{ $p->poin }} pts</p>
                                </div>
                                <span class="material-symbols-outlined text-gray-300 flex-shrink-0">arrow_forward</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Hasil Kategori --}}
            @if($kategoris->isNotEmpty())
                <div>
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-green-500">category</span>
                        Kategori
                        <span class="text-sm font-normal text-gray-400">({{ $kategoris->count() }})</span>
                    </h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach($kategoris as $kat)
                            <a href="{{ route('user.jasa.browse', ['kategori' => $kat->id_kategori]) }}"
                               class="bg-white border border-gray-200 rounded-2xl px-5 py-3 flex items-center gap-3 hover:shadow-md hover:border-indigo-300 transition-all">
                                <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                    <span class="material-symbols-outlined text-[20px]">category</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">
                                        {!! preg_replace('/(' . preg_quote($query, '/') . ')/i', '<mark class="bg-yellow-100 text-yellow-800 rounded px-0.5">$1</mark>', e($kat->nama_kategori)) !!}
                                    </p>
                                    <p class="text-xs text-gray-400">{{ $kat->jasas_count }} jasa</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        @endif
    </div>
</main>

<script>
    // Auto-submit saat user berhenti mengetik (debounce 400ms)
    const input = document.getElementById('searchInput');
    let timer;
    input.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            if (input.value.length >= 2 || input.value.length === 0) {
                input.closest('form').submit();
            }
        }, 400);
    });
</script>

</body>
</html>