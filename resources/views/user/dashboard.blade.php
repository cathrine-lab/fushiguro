<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Dashboard | Tukar Jasa'])
</head>
<body class="font-body-md text-on-surface flex flex-col min-h-screen">

    @include('user.partials.sidebar')

    <main class="md:ml-[280px] min-h-screen pt-16 flex-1">
        @include('user.partials.header', ['title' => 'Dashboard'])

        <div class="p-margin-mobile md:p-margin-desktop pb-0">
            <h1 class="font-headline-lg text-headline-lg text-on-surface mb-xs">
                Selamat Datang, {{ $user->nama }}! 👋
            </h1>
            <p class="font-body-md text-on-surface-variant">
                Kamu punya {{ $activeTransaksi->count() }} transaksi aktif hari ini.
            </p>
        </div>

        <div class="p-margin-mobile md:p-margin-desktop space-y-xl">

            {{-- Hero Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">

                {{-- Points Balance Card --}}
                <div class="lg:col-span-2 primary-gradient rounded-3xl p-xl text-white shadow-xl flex flex-col justify-between relative overflow-hidden group">
                    <div class="absolute -right-12 -top-12 w-64 h-64 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all duration-700"></div>
                    <div class="relative z-10">
                        <p class="font-label-md text-white/80 uppercase tracking-wider">Saldo Saat Ini</p>
                        <h3 class="font-display-lg text-display-lg mt-sm flex items-baseline gap-md">
                            {{ $user->poin }} <span class="text-headline-md font-body-md opacity-80">pts</span>
                        </h3>
                    </div>
                    <div class="mt-2xl flex items-center justify-between relative z-10">
                        <p class="font-body-sm text-white/70">Selamat datang di Tukar Jasa!</p>
                        <a class="bg-white/20 backdrop-blur-md hover:bg-white/30 px-lg py-sm rounded-full text-label-md font-bold transition-all border border-white/20"
                           href="{{ route('user.wallet.index') }}">
                            Lihat Poin
                        </a>
                    </div>
                </div>

                {{-- Quick Stats --}}
                <div class="space-y-lg">
                    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-2xl flex items-center justify-between hover:shadow-md transition-shadow">
                        <div>
                            <p class="font-label-sm text-on-surface-variant">Selesai</p>
                            <h4 class="font-headline-md text-headline-md text-on-surface">{{ $completedCount }}</h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined">task_alt</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-2xl flex items-center justify-between hover:shadow-md transition-shadow">
                        <div>
                            <p class="font-label-sm text-on-surface-variant">Rata-rata Penilaian</p>
                            <h4 class="font-headline-md text-headline-md text-on-surface">
                                {{ $avgRating ? number_format($avgRating, 1) : '-' }}
                                @if($avgRating)<span class="text-body-md text-on-surface-variant font-normal">/5</span>@endif
                            </h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest border border-outline-variant p-lg rounded-2xl flex items-center justify-between hover:shadow-md transition-shadow">
                        <div>
                            <p class="font-label-sm text-on-surface-variant">Jasa Saya</p>
                            <h4 class="font-headline-md text-headline-md text-on-surface">{{ $totalJasa }}</h4>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">design_services</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Middle Grid: Jasa Saya + Activity --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">

                {{-- Jasa Saya (BARU) --}}
                <div class="lg:col-span-8 bg-surface-container-lowest border border-outline-variant rounded-3xl p-lg md:p-xl">
                    <div class="flex items-center justify-between mb-xl flex-wrap gap-md">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-sm">
                            <span class="material-symbols-outlined text-primary">design_services</span>
                            Jasa Saya
                        </h3>
                        <div class="flex items-center gap-sm">
                            <a class="text-label-md text-on-surface-variant font-bold hover:text-primary transition-colors flex items-center gap-1"
                               href="{{ route('user.jasa.index') }}">
                                Lihat semua
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                            <a href="{{ route('user.jasa.create') }}"
                               class="primary-gradient text-white px-lg py-sm rounded-xl text-label-md font-bold hover:opacity-90 transition flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">add</span>
                                Tambah
                            </a>
                        </div>
                    </div>

                    @if($jasasSaya->isEmpty())
                        <div class="flex flex-col items-center justify-center py-2xl text-on-surface-variant text-center">
                            <div class="w-16 h-16 rounded-2xl bg-primary-fixed flex items-center justify-center mb-md">
                                <span class="material-symbols-outlined text-[32px] text-primary">design_services</span>
                            </div>
                            <p class="font-body-sm mb-lg">Kamu belum punya jasa. Mulai tawarkan keahlianmu!</p>
                            <a href="{{ route('user.jasa.create') }}"
                               class="primary-gradient text-white px-lg py-sm rounded-xl text-label-md font-bold hover:opacity-90 transition">
                                Posting Jasa Pertama Anda
                            </a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-md">
                            @foreach($jasasSaya as $jasa)
                                @php
                                    $exchangeCount = $jasa->transaksi->where('status', 'selesai')->count();
                                    $pendingCount = $jasa->transaksi->where('status', 'pending')->count();
                                @endphp
                                <a href="{{ route('user.jasa.edit', $jasa->id_jasa) }}"
                                   class="flex items-start gap-md p-md hover:bg-surface-container-low rounded-2xl transition-all group border border-outline-variant hover:border-primary/30">
                                    <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0 group-hover:bg-primary group-hover:text-on-primary transition-colors">
                                        <span class="material-symbols-outlined">design_services</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-label-md text-on-surface group-hover:text-primary transition-colors truncate">
                                            {{ $jasa->nama_jasa }}
                                        </p>
                                        <span class="inline-block mt-1 text-xs font-medium bg-secondary-fixed text-secondary px-2 py-0.5 rounded-full">
                                            {{ $jasa->kategori->nama_kategori }}
                                        </span>
                                        <div class="flex items-center gap-md mt-2 text-label-sm text-on-surface-variant">
                                            @if($exchangeCount > 0)
                                                <span class="flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-[14px] text-primary">task_alt</span>
                                                    {{ $exchangeCount }}
                                                </span>
                                            @endif
                                            @if($pendingCount > 0)
                                                <span class="flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-[14px] text-amber-500">schedule</span>
                                                    {{ $pendingCount }} pending
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary text-[18px]">edit</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Activity --}}
                <div class="lg:col-span-4">
                    <div class="bg-surface-container-lowest border border-outline-variant rounded-3xl p-lg h-full">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-primary">history</span>
                            Aktivitas
                        </h3>

                        @if($recentActivity->isEmpty())
                            <p class="font-body-sm text-on-surface-variant text-center py-lg">Belum ada aktivitas.</p>
                        @else
                            <div class="relative space-y-lg before:content-[''] before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-[2px] before:bg-outline-variant">
                                @foreach($recentActivity as $activity)
                                    <div class="flex gap-md relative">
                                        <div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center z-10 border-4 border-surface-container-lowest flex-shrink-0">
                                            <span class="material-symbols-outlined text-[12px] text-white">swap_horiz</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-label-sm text-on-surface truncate">{{ $activity->jasa->nama_jasa }}</p>
                                            <p class="font-body-sm text-on-surface-variant text-[12px]">
                                                Status: {{ ucfirst($activity->status) }} &bull; {{ $activity->jumlah_poin }} pts
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Active Transactions (PINDAH KE BAWAH) --}}
            <div class="bg-surface-container-lowest border border-outline-variant rounded-3xl p-lg md:p-xl">
                <div class="flex items-center justify-between mb-xl">
                    <h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-sm">
                        <span class="material-symbols-outlined text-primary">swap_horiz</span>
                        Transaksi Aktif
                    </h3>
                    <a class="text-label-md text-primary font-bold hover:underline flex items-center gap-1"
                       href="{{ route('user.transaksi.index') }}">
                        Lihat semua
                        <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                    </a>
                </div>

                @if($activeTransaksi->isEmpty())
                    <div class="flex flex-col items-center justify-center py-2xl text-on-surface-variant">
                        <span class="material-symbols-outlined text-[48px] mb-md opacity-40">inbox</span>
                        <p class="font-body-sm">Belum ada transaksi aktif.</p>
                        <a href="{{ route('user.jasa.browse') }}"
                           class="mt-lg primary-gradient text-white px-lg py-sm rounded-xl text-label-md font-bold hover:opacity-90 transition">
                            Jelajahi Jasa
                        </a>
                    </div>
                @else
                    <div class="space-y-md">
                        @foreach($activeTransaksi as $transaksi)
                            <a href="{{ route('user.transaksi.show', $transaksi->id_transaksi) }}"
                               class="flex items-center gap-md p-md hover:bg-surface-container-low rounded-2xl transition-all cursor-pointer group">
                                <div class="w-14 h-14 rounded-xl bg-surface-container-high flex items-center justify-center group-hover:bg-primary-fixed group-hover:text-primary transition-colors flex-shrink-0">
                                    <span class="material-symbols-outlined text-primary">design_services</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-label-md text-on-surface group-hover:text-primary transition-colors truncate">
                                        {{ $transaksi->jasa->nama_jasa }}
                                    </p>
                                    <p class="font-body-sm text-on-surface-variant">
                                        dengan {{ $transaksi->penyedia->nama }}
                                    </p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    @php
                                        $statusColor = match($transaksi->status) {
                                            'pending' => 'bg-tertiary-fixed text-tertiary',
                                            'proses'  => 'bg-secondary-fixed text-secondary',
                                            default   => 'bg-primary-fixed text-primary',
                                        };
                                        $statusLabel = match($transaksi->status) {
                                            'pending' => 'Pending',
                                            'proses'  => 'In Progress',
                                            default   => ucfirst($transaksi->status),
                                        };
                                    @endphp
                                    <span class="px-md py-1 {{ $statusColor }} rounded-full font-label-sm">
                                        {{ $statusLabel }}
                                    </span>
                                    <p class="mt-1 font-body-sm text-on-surface-variant">{{ $transaksi->jumlah_poin }} pts</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </main>

    @include('user.partials.footer')

    {{-- Mobile Nav --}}
    <nav class="md:hidden fixed bottom-0 left-0 w-full h-16 bg-surface/90 backdrop-blur-md border-t border-outline-variant flex items-center justify-around z-50">
        <a class="flex flex-col items-center gap-1 text-primary" href="{{ route('user.dashboard') }}">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">dashboard</span>
            <span class="font-label-sm text-[10px]">Home</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.jasa.browse') }}">
            <span class="material-symbols-outlined">explore</span>
            <span class="font-label-sm text-[10px]">Explore</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.transaksi.index') }}">
            <span class="material-symbols-outlined">swap_horiz</span>
            <span class="font-label-sm text-[10px]">Transaksi</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.profil.show', Auth::id()) }}">
            <span class="material-symbols-outlined">person</span>
            <span class="font-label-sm text-[10px]">Profile</span>
        </a>
    </nav>
</body>
</html>