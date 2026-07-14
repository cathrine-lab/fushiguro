<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin Dashboard | Tukar Jasa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; display:inline-block; line-height:1; }
        body { font-family:'Inter',sans-serif; background-color:#f7f9fb; }
        .custom-shadow { box-shadow:0 10px 15px -3px rgba(55,48,163,.05),0 4px 6px -2px rgba(55,48,163,.02); }
        .primary-gradient { background:linear-gradient(135deg,#712ae2 0%,#1f108e 100%); }
    </style>
    <script id="tailwind-config">
        tailwind.config = { darkMode:"class", theme:{ extend:{ "colors":{
            "surface-container-lowest":"#ffffff","surface-container-low":"#f2f4f6",
            "surface-container":"#eceef0","surface-container-high":"#e6e8ea",
            "on-surface":"#191c1e","on-surface-variant":"#464553",
            "outline-variant":"#c8c4d5","primary":"#1f108e","secondary":"#712ae2",
            "primary-fixed":"#e2dfff","secondary-fixed":"#eaddff","tertiary-fixed":"#d4e3ff",
            "error":"#ba1a1a","error-container":"#ffdad6"
        }, "spacing":{ "sm":"8px","md":"16px","lg":"24px","xl":"32px","gutter":"24px","xs":"4px" } } } }
    </script>
</head>
<body class="bg-[#f7f9fb] text-[#191c1e]">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-4 md:p-10">

    <header class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Admin Dashboard</h2>
            <p class="text-sm text-gray-500 mt-0.5">Monitoring ekosistem Tukar Jasa</p>
        </div>
        <button class="p-2 text-gray-400 hover:bg-gray-100 rounded-full transition">
            <span class="material-symbols-outlined">notifications</span>
        </button>
    </header>

    {{-- Stat Cards --}}
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-200 custom-shadow">
            <span class="p-2 bg-indigo-50 text-indigo-600 rounded-xl material-symbols-outlined inline-block mb-3">person</span>
            <p class="text-gray-500 text-sm">Total Pengguna</p>
            <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($totalPengguna) }}</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-200 custom-shadow">
            <span class="p-2 bg-purple-50 text-purple-600 rounded-xl material-symbols-outlined inline-block mb-3">handshake</span>
            <p class="text-gray-500 text-sm">Total Jasa</p>
            <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($totalJasa) }}</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-200 custom-shadow">
            <span class="p-2 bg-green-50 text-green-600 rounded-xl material-symbols-outlined inline-block mb-3">swap_horiz</span>
            <p class="text-gray-500 text-sm">Total Transaksi</p>
            <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($totalTransaksi) }}</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-200 custom-shadow">
            <span class="p-2 bg-yellow-50 text-yellow-600 rounded-xl material-symbols-outlined inline-block mb-3">payments</span>
            <p class="text-gray-500 text-sm">Poin Beredar</p>
            <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($totalPoinBeredar) }}</h3>
        </div>
    </section>

    {{-- Main Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Transaksi Terbaru --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 custom-shadow overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-semibold text-gray-800">Transaksi Terbaru</h4>
                <a href="{{ route('backoffice.transaksi.index') }}" class="text-sm text-indigo-600 font-semibold hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400">Jasa</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400">Penerima</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400">Poin</th>
                            <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($transaksiTerbaru as $t)
                            @php
                                $badge = match($t->status) {
                                    'pending'    => 'bg-yellow-100 text-yellow-700',
                                    'proses'     => 'bg-blue-100 text-blue-700',
                                    'selesai'    => 'bg-green-100 text-green-700',
                                    'dibatalkan' => 'bg-red-100 text-red-600',
                                };
                            @endphp
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                            <span class="material-symbols-outlined text-gray-400 text-[18px]">design_services</span>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ Str::limit($t->jasa->nama_jasa ?? 'Jasa Dihapus', 28) }}</p>
                                            {{-- PERBAIKAN: Gunakan optional() untuk mencegah error diffForHumans --}}
                                            <p class="text-xs text-gray-400">{{ optional($t->tgl_transaksi)->diffForHumans() ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-gray-600">{{ $t->penerima->nama ?? '-' }}</td>
                                <td class="px-5 py-3 font-bold text-indigo-600">{{ number_format($t->jumlah_poin) }}</td>
                                <td class="px-5 py-3">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-semibold {{ $badge }}">
                                        {{ ucfirst($t->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-10 text-center text-sm text-gray-400">Belum ada transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pengguna Terbaru + Status Transaksi --}}
        <div class="bg-white rounded-2xl border border-gray-200 custom-shadow flex flex-col overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-semibold text-gray-800">Pengguna Terbaru</h4>
                <a href="{{ route('backoffice.pengguna.index') }}" class="text-sm text-indigo-600 font-semibold hover:underline">Lihat Semua</a>
            </div>
            <div class="flex-1 p-5 space-y-4">
                @forelse($penggunaTerbaru as $p)
                    <a href="{{ route('backoffice.pengguna.show', $p->id_pengguna) }}"
                       class="flex items-center justify-between hover:bg-gray-50 rounded-xl p-2 -mx-2 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm flex-shrink-0">
                                {{ strtoupper(substr($p->nama, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $p->nama }}</p>
                                {{-- PERBAIKAN: Gunakan optional() untuk created_at --}}
                                <p class="text-xs text-gray-400">{{ optional($p->created_at)->diffForHumans() ?? '-' }}</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold text-indigo-600">{{ number_format($p->poin) }} pts</span>
                    </a>
                @empty
                    <p class="text-sm text-gray-400 text-center py-6">Belum ada pengguna</p>
                @endforelse
            </div>

            {{-- Status Transaksi --}}
            <div class="p-5 border-t border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Status Transaksi</p>
                <div class="grid grid-cols-2 gap-2">
                    <div class="bg-yellow-50 rounded-xl p-3 text-center">
                        <p class="text-xl font-bold text-yellow-700">{{ $transaksiPerStatus['pending'] }}</p>
                        <p class="text-xs text-yellow-500 mt-0.5">Pending</p>
                    </div>
                    <div class="bg-blue-50 rounded-xl p-3 text-center">
                        <p class="text-xl font-bold text-blue-700">{{ $transaksiPerStatus['proses'] }}</p>
                        <p class="text-xs text-blue-500 mt-0.5">Proses</p>
                    </div>
                    <div class="bg-green-50 rounded-xl p-3 text-center">
                        <p class="text-xl font-bold text-green-700">{{ $transaksiPerStatus['selesai'] }}</p>
                        <p class="text-xs text-green-500 mt-0.5">Selesai</p>
                    </div>
                    <div class="bg-red-50 rounded-xl p-3 text-center">
                        <p class="text-xl font-bold text-red-600">{{ $transaksiPerStatus['dibatalkan'] }}</p>
                        <p class="text-xs text-red-400 mt-0.5">Dibatalkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        {{-- Kategori Populer --}}
        <div class="bg-white p-6 rounded-2xl border border-gray-200 custom-shadow">
            <div class="flex items-center justify-between mb-5">
                <h4 class="font-semibold text-gray-800">Kategori Terpopuler</h4>
                <a href="{{ route('backoffice.kategori.index') }}" class="text-sm text-indigo-600 font-semibold hover:underline">Kelola</a>
            </div>
            @forelse($kategoriPopuler as $index => $kat)
                @php 
                    $maxCount = $kategoriPopuler->first()?->jasas_count ?? 1;
                    $pct = $maxCount > 0 ? ($kat->jasas_count / $maxCount) * 100 : 0; 
                @endphp
                <div class="flex items-center gap-3 mb-3">
                    <span class="w-6 h-6 rounded-full bg-indigo-100 text-indigo-700 text-xs font-bold flex items-center justify-center flex-shrink-0">{{ $index + 1 }}</span>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-700 truncate">{{ $kat->nama_kategori }}</p>
                        <div class="w-full bg-gray-100 rounded-full h-1.5 mt-1">
                            <div class="bg-indigo-500 h-1.5 rounded-full" style="width: {{ $pct }}%"></div>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-gray-400 flex-shrink-0">{{ $kat->jasas_count }}</span>
                </div>
            @empty
                <p class="text-sm text-gray-400 text-center py-6">Belum ada kategori</p>
            @endforelse
        </div>

        {{-- System Info --}}
        <div class="primary-gradient text-white p-6 rounded-2xl custom-shadow flex flex-col justify-between">
            <div>
                <span class="material-symbols-outlined text-[40px] opacity-80">verified_user</span>
                <h4 class="text-lg font-bold mt-3 mb-1">System Health: Optimal</h4>
                <p class="text-sm opacity-75">Semua layanan berjalan normal.</p>
            </div>
            <div class="mt-6 space-y-2">
                @if($avgRatingPlatform)
                    <div class="flex items-center justify-between bg-white/10 rounded-xl px-4 py-2">
                        <span class="text-sm">Avg Rating Platform</span>
                        <span class="font-bold">{{ number_format($avgRatingPlatform, 1) }} / 5</span>
                    </div>
                @endif
                <div class="flex items-center justify-between bg-white/10 rounded-xl px-4 py-2">
                    <span class="text-sm">Transaksi Selesai</span>
                    <span class="font-bold">{{ $transaksiPerStatus['selesai'] }}</span>
                </div>
                <div class="flex items-center justify-between bg-white/10 rounded-xl px-4 py-2">
                    <span class="text-sm">Total Poin Beredar</span>
                    <span class="font-bold">{{ number_format($totalPoinBeredar) }}</span>
                </div>
            </div>
        </div>
    </div>

</main>

@if(session('notif_title'))
    <script>
        Swal.fire({
            title: "{{ session('notif_title') }}",
            text: "{{ session('notif_text') }}",
            icon: "{{ session('notif_icon') }}",
            confirmButtonText: 'OK'
        });
    </script>
@endif

</body>
</html>