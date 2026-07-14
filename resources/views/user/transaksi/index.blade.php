<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'My Exchanges | Tukar Jasa'])
    <style>
        .glass-card { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(8px); }
    </style>
</head>
<body class="bg-background text-on-surface antialiased font-body-md">

    @include('user.partials.sidebar')

    {{-- PERUBAHAN: Tambahkan pt-16 agar tidak tertutup header fixed --}}
    <main class="md:ml-[280px] min-h-screen p-margin-mobile md:p-margin-desktop pb-24 md:pb-0 pt-16">

        {{-- Header Global Baru --}}
        @include('user.partials.header', ['title' => 'Transaksi'])

        {{-- Local Search Bar (Dipindah ke sini karena header global sudah ada menu) --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-lg mb-2xl mt-xl">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Transaksi</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Lihat riwayat pertukaran jasa Anda.</p>
            </div>
            <div class="flex items-center gap-md w-full md:w-auto">
                <div class="relative flex-1 md:flex-none">
                    <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">search</span>
                    <input id="searchInput" type="text"
                        class="pl-xl pr-md py-sm bg-surface border border-outline-variant rounded-xl w-full md:w-64 focus:ring-2 focus:ring-secondary/20 focus:border-secondary outline-none transition-all"
                        placeholder="    Cari Transaksi..." />
                </div>
                <button id="filterBtn" class="p-sm bg-surface border border-outline-variant rounded-xl hover:bg-surface-container-low transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant">filter_list</span>
                </button>
            </div>
        </div>

        @php
            // Gabungkan semua transaksi, lalu kelompokkan berdasarkan status
            $all = $sebagaiPenerima->merge($sebagaiPenyedia)->sortByDesc('tgl_transaksi');

            $groups = [
                'pending'    => ['label' => 'Pending Approval',    'dot' => 'bg-amber-500',   'items' => collect()],
                'proses'     => ['label' => 'In Progress',         'dot' => 'bg-blue-500',    'items' => collect()],
                'selesai'    => ['label' => 'Completed',           'dot' => 'bg-emerald-500', 'items' => collect()],
                'dibatalkan' => ['label' => 'Cancelled',           'dot' => 'bg-red-500',     'items' => collect()],
            ];

            foreach ($all as $t) {
                if (isset($groups[$t->status])) {
                    $groups[$t->status]['items']->push($t);
                }
            }

            $userId = Auth::id();
        @endphp

        @if($all->isEmpty())
            {{-- Empty State --}}
            <div class="bg-surface-container-lowest border border-outline-variant rounded-3xl p-2xl flex flex-col items-center justify-center text-center">
                <div class="w-20 h-20 rounded-2xl bg-primary-fixed flex items-center justify-center mb-lg">
                    <span class="material-symbols-outlined text-[40px] text-primary">swap_horiz</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-on-surface mb-sm">Belum ada transaksi</h3>
                <p class="font-body-sm text-on-surface-variant max-w-sm mb-lg">
                    Mulai tukar keahlian dengan pengguna lain. Jelajahi jasa yang tersedia dan kirim request pertamamu!
                </p>
                <a href="{{ route('user.jasa.browse') }}"
                   class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-sm hover:opacity-90 transition">
                    Jelajahi Jasa
                </a>
            </div>
        @else

            <div class="space-y-3xl" id="transactionList">

                @foreach($groups as $status => $group)
                    @if($group['items']->isNotEmpty())
                        <section class="transaction-section" data-status="{{ $status }}">
                            <div class="flex items-center gap-md mb-lg">
                                <div class="w-2 h-2 rounded-full {{ $group['dot'] }}"></div>
                                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $group['label'] }}</h3>
                                <span class="bg-surface-container-high text-on-surface px-md py-xs rounded-full font-label-sm text-label-sm">
                                    {{ $group['items']->count() }} {{ \Str::plural('Item', $group['items']->count()) }}
                                </span>
                            </div>

                            <div class="grid grid-cols-1 gap-gutter">
                                @foreach($group['items'] as $t)
                                    @php
                                        $isPenyedia = $t->id_penyedia_jasa === $userId;
                                        $lawan = $isPenyedia ? $t->penerima : $t->penyedia;

                                        // Badge label per status
                                        $badge = match($t->status) {
                                            'pending'    => ['bg-amber-100 text-amber-800',   'Waiting for Response'],
                                            'proses'     => ['bg-blue-100 text-blue-800',     'In Progress'],
                                            'selesai'    => ['bg-emerald-100 text-emerald-800','Exchange Success'],
                                            'dibatalkan' => ['bg-red-100 text-red-700',       'Cancelled'],
                                        };

                                        // Role label (You vs Lawan)
                                        $youRole  = $isPenyedia ? 'Provider' : 'Requester';
                                        $lawanRole = $isPenyedia ? 'Requester' : 'Provider';
                                    @endphp

                                    <a href="{{ route('user.transaksi.show', $t->id_transaksi) }}"
                                       class="transaction-card bg-surface-container-lowest border border-outline-variant rounded-xl p-lg flex flex-col md:flex-row md:items-center gap-lg hover:shadow-md hover:-translate-y-0.5 transition-all group block {{ $t->status === 'proses' ? 'relative overflow-hidden' : '' }}">

                                        {{-- Accent bar untuk In Progress --}}
                                        @if($t->status === 'proses')
                                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500"></div>
                                        @endif

                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-sm mb-xs flex-wrap">
                                                <span class="{{ $badge[0] }} px-md py-xs rounded-full font-label-sm text-label-sm">
                                                    {{ $badge[1] }}
                                                </span>

                                                {{-- Rating bintang kalau selesai & ada ulasan --}}
                                                @if($t->status === 'selesai' && $t->ulasan)
                                                    <div class="flex text-amber-400">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <span class="material-symbols-outlined text-[16px]"
                                                                  style="font-variation-settings: 'FILL' {{ $i <= $t->ulasan->rating ? 1 : 0 }}">star</span>
                                                        @endfor
                                                    </div>
                                                @endif
                                            </div>

                                            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-sm group-hover:text-primary transition-colors">
                                                {{ $t->jasa->nama_jasa }}
                                            </h4>

                                            <div class="flex items-center gap-md">
                                                {{-- Avatar stack --}}
                                                <div class="flex -space-x-2">
                                                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-secondary-fixed flex items-center justify-center text-secondary font-bold text-xs"
                                                         title="{{ $t->penyedia->nama }} ({{ $t->penyedia->id_pengguna === $userId ? 'You' : 'Provider' }})">
                                                        {{ strtoupper(substr($t->penyedia->nama, 0, 1)) }}
                                                    </div>
                                                    <div class="w-8 h-8 rounded-full border-2 border-surface bg-tertiary-fixed flex items-center justify-center text-tertiary font-bold text-xs"
                                                         title="{{ $t->penerima->nama }} ({{ $t->penerima->id_pengguna === $userId ? 'You' : 'Requester' }})">
                                                        {{ strtoupper(substr($t->penerima->nama, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                                    {{ $t->penyedia->nama }}
                                                    <span class="mx-base">↔</span>
                                                    {{ $t->penerima->nama }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex flex-row md:flex-col items-center md:items-end justify-between md:justify-center gap-sm flex-shrink-0">
                                            <div class="text-right">
                                                <p class="font-label-sm text-label-sm text-on-surface-variant">Value</p>
                                                <p class="font-headline-sm text-headline-sm text-primary">{{ $t->jumlah_poin }} pts</p>
                                            </div>
                                            <span class="px-xl py-sm border border-outline-variant rounded-xl font-label-md text-label-md text-on-surface group-hover:bg-surface-container-low group-hover:border-primary group-hover:text-primary transition-colors">
                                                View Detail
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endif
                @endforeach

            </div>
        @endif
    </main>

    @include('user.partials.footer')

    {{-- Mobile Nav --}}
    <nav class="md:hidden fixed bottom-0 left-0 w-full h-16 bg-surface/90 backdrop-blur-md border-t border-outline-variant flex items-center justify-around z-50">
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-label-sm text-[10px]">Home</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-primary" href="{{ route('user.transaksi.index') }}">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">swap_horiz</span>
            <span class="font-label-sm text-[10px]">Exchanges</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.profil.show', Auth::id()) }}">
            <span class="material-symbols-outlined">person</span>
            <span class="font-label-sm text-[10px]">Profile</span>
        </a>
    </nav>

    <script>
        // Search filter (client-side)
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const q = e.target.value.toLowerCase();
                document.querySelectorAll('.transaction-card').forEach(card => {
                    const text = card.textContent.toLowerCase();
                    card.style.display = text.includes(q) ? '' : 'none';
                });
                // Hide empty sections
                document.querySelectorAll('.transaction-section').forEach(sec => {
                    const visible = sec.querySelectorAll('.transaction-card[style=""], .transaction-card:not([style])');
                    const hasVisible = Array.from(sec.querySelectorAll('.transaction-card')).some(c => c.style.display !== 'none');
                    sec.style.display = hasVisible ? '' : 'none';
                });
            });
        }

        // Entrance animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.transaction-section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'all 0.6s cubic-bezier(0.22, 1, 0.36, 1)';
            observer.observe(section);
        });

        // SweetAlert notification
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