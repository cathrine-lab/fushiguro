<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Browse Services | Tukar Jasa</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS with Config -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-surface": "#2d3133", "on-secondary": "#ffffff", "on-tertiary-container": "#78b2ff",
                        "inverse-on-surface": "#eff1f3", "error-container": "#ffdad6", "tertiary-fixed": "#d4e3ff",
                        "surface-container-low": "#f2f4f6", "on-primary": "#ffffff", "tertiary-container": "#00447d",
                        "inverse-primary": "#c3c0ff", "surface-container-highest": "#e0e3e5", "on-tertiary": "#ffffff",
                        "on-secondary-fixed-variant": "#5a00c6", "on-secondary-container": "#fffbff", "on-primary-fixed": "#0f0069",
                        "background": "#f7f9fb", "on-error": "#ffffff", "on-secondary-fixed": "#25005a",
                        "secondary-fixed-dim": "#d2bbff", "surface-tint": "#544fc0", "secondary-container": "#8a4cfc",
                        "outline-variant": "#c8c4d5", "secondary": "#712ae2", "outline": "#777584",
                        "surface-container-high": "#e6e8ea", "on-primary-fixed-variant": "#3b35a7",
                        "surface-variant": "#e0e3e5", "secondary-fixed": "#eaddff", "on-surface-variant": "#464553",
                        "primary-container": "#3730a3", "tertiary-fixed-dim": "#a4c9ff", "surface-dim": "#d8dadc",
                        "on-tertiary-fixed-variant": "#004883", "primary-fixed-dim": "#c3c0ff", "tertiary": "#002d57",
                        "surface-bright": "#f7f9fb", "on-surface": "#191c1e", "on-primary-container": "#a9a7ff",
                        "primary": "#1f108e", "error": "#ba1a1a", "primary-fixed": "#e2dfff", "on-background": "#191c1e",
                        "surface": "#f7f9fb", "surface-container-lowest": "#ffffff", "on-error-container": "#93000a",
                        "surface-container": "#eceef0", "on-tertiary-fixed": "#001c39"
                    },
                    "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                    "spacing": {
                        "sm": "8px", "xl": "32px", "2xl": "48px", "margin-desktop": "40px", "margin-mobile": "16px",
                        "base": "4px", "md": "16px", "lg": "24px", "gutter": "24px", "3xl": "64px", "xs": "4px"
                    },
                    "fontFamily": {
                        "body-lg": ["Inter"], "headline-sm": ["Inter"], "label-md": ["Inter"], "body-md": ["Inter"],
                        "headline-md": ["Inter"], "headline-lg": ["Inter"], "body-sm": ["Inter"],
                        "display-lg": ["Inter"], "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "1.25", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.02em", "fontWeight": "500"}]
                    }
                },
            },
        }
    </script>
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block; vertical-align: middle;
        }
        .btn-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
        .soft-shadow { box-shadow: 0 10px 15px -3px rgba(55, 48, 163, 0.05), 0 4px 6px -2px rgba(55, 48, 163, 0.02); }
        
        /* Custom Scrollbar for Range Slider */
        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none; height: 20px; width: 20px; border-radius: 50%;
            background: #1f108e; cursor: pointer; margin-top: -8px;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 100%; height: 4px; cursor: pointer; background: #e0e3e5; border-radius: 2px;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md">

<!-- Top Navigation Bar (Standalone) -->
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-mobile md:px-margin-desktop h-16 border-b border-outline-variant shadow-sm">
    <div class="flex items-center gap-xl">
        <a href="{{ route('user.dashboard') }}" class="font-headline-md text-headline-md font-bold text-primary">Tukar Jasa</a>
        <div class="hidden md:flex items-center gap-lg">
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('user.dashboard') }}">Home</a>
            <a class="font-body-md text-body-md font-bold border-b-2 border-primary text-primary transition-colors" href="{{ route('user.jasa.browse') }}">Explore</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('user.transaksi.index') }}">About Us</a>
        </div>
    </div>
    
    <!-- Global Search -->
    <div class="hidden md:block flex-1 max-w-md mx-xl relative">
        <form method="GET" action="{{ route('user.search') }}">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
            <input name="q" type="text" 
                class="w-full pl-10 pr-4 py-2 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary/20 text-body-sm outline-none" 
                placeholder="Cari jasa, pengguna..." />
        </form>
    </div>
    
    <div class="flex items-center gap-md">
        <a href="{{ route('user.search') }}" class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container rounded-full md:hidden">search</a>
        <a href="{{ route('user.wallet.index') }}" class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container rounded-full relative">
            account_balance_wallet
        </a>
        <a href="#" class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container rounded-full relative">
            notifications
            @php
                $pendingCount = \App\Models\Transaksi::where('id_penyedia_jasa', Auth::id())
                    ->where('status', 'pending')->count();
            @endphp
            @if($pendingCount > 0)
                <span class="absolute top-0 right-0 w-4 h-4 bg-error text-white text-[10px] font-bold rounded-full flex items-center justify-center">{{ $pendingCount }}</span>
            @endif
        </a>
        <div class="h-8 w-[1px] bg-outline-variant mx-1 hidden md:block"></div>
        <a href="{{ route('user.profil.show', Auth::id()) }}" 
           class="flex items-center gap-sm hover:bg-surface-container rounded-xl px-2 py-1 transition-colors">
            <div class="h-9 w-9 rounded-full btn-gradient flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
            </div>
        </a>
    </div>
</nav>

<main class="pt-12 pb-3xl px-margin-mobile md:px-margin-desktop max-w-[1440px] mx-auto min-h-screen">
    
    <!-- Breadcrumbs & Header -->
    <div class="mb-xl mt-xl">
            <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-md">
                <a class="hover:text-primary transition-colors" href="{{ route('user.dashboard') }}">Home</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary font-bold">Explore</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-lg">
                <div>
                    <h1 class="font-headline-lg text-headline-lg text-on-surface">Jelajahi Keterampilan & Layanan</h1>
                    <p class="text-on-surface-variant font-body-md mt-xs">Temukan orang yang tepat untuk bertukar keterampilan hari ini.</p>
                </div>
                <a href="{{ route('user.jasa.create') }}" 
                   class="btn-gradient text-white px-xl py-md rounded-xl font-label-md shadow-lg shadow-primary/20 hover:scale-[0.98] transition-transform flex items-center gap-sm self-start">
                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                    Posting Jasa Anda
                </a>
            </div>
        </div>

        {{-- CATEGORY SHORTCUTS (Pengganti Halaman Kategori Terpisah) --}}
        @if($kategoris->isNotEmpty() && !request('kategori'))
            <div class="mb-2xl">
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg flex items-center gap-sm">
                    <span class="material-symbols-outlined text-primary">category</span>
                    Browse by Category
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-md">
                    @foreach($kategoris as $kat)
                        @php
                            $iconMap = [
                                'programming' => 'code', 'tech' => 'code', 'design' => 'palette',
                                'writing' => 'edit_note', 'marketing' => 'trending_up', 'business' => 'business_center',
                                'music' => 'music_note', 'translation' => 'translate', 'teaching' => 'school',
                            ];
                            $icon = 'apps';
                            foreach ($iconMap as $key => $ic) {
                                if (str_contains(strtolower($kat->nama_kategori), $key)) { $icon = $ic; break; }
                            }
                        @endphp
                        <a href="{{ route('user.jasa.browse', ['kategori' => $kat->id_kategori]) }}" 
                           class="bg-surface-container-lowest border border-outline-variant p-md rounded-xl hover:border-primary hover:-translate-y-1 transition-all group flex flex-col items-center text-center gap-sm soft-shadow">
                            <div class="w-10 h-10 rounded-lg bg-primary-fixed flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-[24px]">{{ $icon }}</span>
                            </div>
                            <span class="font-label-md text-label-md text-on-surface group-hover:text-primary transition-colors line-clamp-1">
                                {{ $kat->nama_kategori }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-gutter">
            
            {{-- Sidebar Filters --}}
            <aside class="w-full lg:w-[280px] shrink-0">
                <form method="GET" action="{{ route('user.jasa.browse') }}" 
                      class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl soft-shadow lg:sticky lg:top-24">
                    
                    <div class="flex items-center justify-between mb-lg">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface flex items-center gap-sm">
                            <span class="material-symbols-outlined text-primary">tune</span>
                            Filters
                        </h3>
                        @if(request('kategori') || request('cari'))
                            <a href="{{ route('user.jasa.browse') }}" class="text-primary font-label-sm text-label-sm hover:underline">Reset All</a>
                        @endif
                    </div>

                    <!-- Search Input -->
                    <div class="mb-xl">
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[18px]">search</span>
                            <input type="text" name="cari" value="{{ request('cari') }}" 
                                class="w-full pl-10 pr-4 py-2.5 bg-surface-container rounded-xl border-none focus:ring-2 focus:ring-primary/20 text-body-sm outline-none" 
                                placeholder="Cari Jasa..." />
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="mb-xl">
                        <label for="kategoriFilter" class="font-label-md text-label-md mb-md flex items-center gap-xs text-on-surface">
                            <span class="material-symbols-outlined text-[18px]">category</span>
                            Kategori
                        </label>
                        <div class="relative">
                            <select id="kategoriFilter" name="kategori" 
                                class="w-full appearance-none bg-surface-container rounded-xl border-none py-2.5 pl-4 pr-10 text-body-sm text-on-surface focus:ring-2 focus:ring-primary/20 outline-none cursor-pointer">
                                <option value="" {{ !request('kategori') ? 'selected' : '' }}>Semua Kategori</option>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id_kategori }}" 
                                        {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-primary-fixed/50 border border-primary/10 rounded-xl p-md mb-lg">
                        <div class="flex gap-sm">
                            <span class="material-symbols-outlined text-primary text-[20px] flex-shrink-0">info</span>
                            <div>
                                <p class="font-label-sm text-label-sm text-on-surface">Points Fleksibel</p>
                                <p class="font-body-sm text-body-sm text-on-surface-variant mt-xs">
                                    Poin dinegosiasikan langsung dengan penyedia layanan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" 
                        class="w-full py-3 btn-gradient text-on-primary rounded-xl font-label-md text-label-md hover:scale-[0.98] transition-transform shadow-lg shadow-primary/20 flex items-center justify-center gap-sm">
                        <span class="material-symbols-outlined text-[18px]">check</span>
                        Terapkan Filter
                    </button>
                </form>
            </aside>

            {{-- Main Grid --}}
            <div class="flex-1">
                
                {{-- Active Filters / Results Count --}}
                @if(request('cari') || request('kategori'))
                    <div class="flex items-center justify-between mb-lg flex-wrap gap-md bg-surface-container-low/50 p-md rounded-xl">
                        <p class="font-body-sm text-on-surface-variant">
                            @php
                                $activeKat = $kategoris->firstWhere('id_kategori', request('kategori'));
                            @endphp
                            Menampilkan 
                            <span class="font-bold text-on-surface">{{ $jasas->count() }}</span> 
                            hasil
                            @if(request('cari'))
                                untuk "<span class="text-primary font-bold">{{ request('cari') }}</span>"
                            @endif
                            @if($activeKat)
                                di <span class="text-primary font-bold">{{ $activeKat->nama_kategori }}</span>
                            @endif
                        </p>
                        <a href="{{ route('user.jasa.browse') }}" class="text-label-sm text-error hover:underline">Hapus Filter</a>
                    </div>
                @endif

                @if($jasas->isEmpty())
                    {{-- Empty State --}}
                    <div class="bg-surface-container-lowest border border-outline-variant rounded-2xl p-2xl flex flex-col items-center justify-center text-center soft-shadow">
                        <div class="w-20 h-20 rounded-2xl bg-primary-fixed flex items-center justify-center mb-lg">
                            <span class="material-symbols-outlined text-[40px] text-primary">search_off</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-sm">Tidak ada jasa ditemukan</h3>
                        <p class="font-body-sm text-on-surface-variant max-w-sm mb-lg">
                            @if(request('cari') || request('kategori'))
                                Coba ubah kata kunci atau hapus filter kategori untuk melihat lebih banyak hasil.
                            @else
                                Jadilah yang pertama memposting layanan dan mulai kumpulkan poin!
                            @endif
                        </p>
                        <div class="flex gap-md">
                            <a href="{{ route('user.jasa.create') }}" 
                               class="px-xl py-md btn-gradient text-white rounded-xl font-label-md shadow-lg shadow-primary/20 hover:scale-[0.98] transition-transform">
                                Posting Jasa
                            </a>
                        </div>
                    </div>
                @else
                       <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-lg">
                    @foreach($jasas as $jasa)
                        @php
                            // Dynamic gradient based on category ID
                            $gradientIndex = ($jasa->id_kategori % 5) + 1;
                            $gradientClass = "category-gradient-{$gradientIndex}";
                            
                            // Icon mapping logic
                            $iconMap = [
                                'programming' => 'code', 'tech' => 'code', 'development' => 'code',
                                'design' => 'palette', 'graphic' => 'brush',
                                'marketing' => 'trending_up', 'seo' => 'analytics',
                                'writing' => 'edit_note', 'translation' => 'translate',
                                'business' => 'business_center', 'consulting' => 'psychology',
                                'teaching' => 'school', 'tutoring' => 'auto_stories',
                            ];
                            $katName = strtolower($jasa->kategori->nama_kategori ?? '');
                            $icon = 'design_services';
                            foreach ($iconMap as $key => $ic) {
                                if (str_contains($katName, $key)) { $icon = $ic; break; }
                            }

                            // Rating calculation
                            $avgRating = $jasa->transaksi->flatMap->ulasan->filter()->avg('rating');
                            $reviewCount = $jasa->transaksi->flatMap->ulasan->filter()->count();
                            $exchangeCount = $jasa->transaksi->where('status', 'selesai')->count();
                        @endphp
                        
                        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden soft-shadow hover:-translate-y-1 transition-transform duration-300 group flex flex-col">
                            <!-- Image Area (Gradient + Icon) -->
                            <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}" 
                               class="relative h-48 overflow-hidden {{ $gradientClass }} flex items-center justify-center">
                                <span class="material-symbols-outlined text-white/30 text-[120px] group-hover:scale-110 transition-transform duration-500">
                                    {{ $icon }}
                                </span>
                                
                                <!-- Exchange Count Badge -->
                                @if($exchangeCount > 0)
                                <div class="absolute top-3 right-3 bg-surface/90 backdrop-blur px-3 py-1 rounded-full text-primary font-label-sm text-label-sm font-bold border border-primary/20 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">swap_horiz</span>
                                    {{ $exchangeCount }}
                                </div>
                                @endif
                                
                                <!-- Category Badge -->
                                <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-on-surface font-label-sm text-label-sm font-bold">
                                    {{ $jasa->kategori->nama_kategori }}
                                </div>
                            </a>
                            
                            <!-- Content -->
                            <div class="p-lg flex flex-col flex-1">
                                <span class="text-secondary font-label-sm text-label-sm uppercase tracking-wider mb-xs block">
                                    {{ $jasa->kategori->nama_kategori }}
                                </span>
                                <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}" 
                                   class="font-headline-sm text-headline-sm text-on-surface mb-md group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $jasa->nama_jasa }}
                                </a>
                                <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2 mb-lg">
                                    {{ $jasa->deskripsi }}
                                </p>
                                
                                <!-- Owner Info -->
                                <div class="flex items-center gap-sm mb-lg mt-auto">
                                    <a href="{{ route('user.profil.show', $jasa->pemilik->id_pengguna) }}" 
                                       class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-primary flex-shrink-0 hover:ring-2 hover:ring-primary/30 transition">
                                        {{ strtoupper(substr($jasa->pemilik->nama, 0, 1)) }}
                                    </a>
                                    <div class="flex-1 min-w-0">
                                        <a href="{{ route('user.profil.show', $jasa->pemilik->id_pengguna) }}" 
                                           class="font-label-md text-label-md text-on-surface hover:text-primary transition-colors truncate block">
                                            {{ $jasa->pemilik->nama }}
                                        </a>
                                        <div class="flex items-center gap-xs">
                                            @if($avgRating)
                                                <span class="material-symbols-outlined text-[14px] text-secondary" style="font-variation-settings: 'FILL' 1;">star</span>
                                                <span class="text-on-surface-variant font-label-sm text-label-sm">
                                                    {{ number_format($avgRating, 1) }} ({{ $reviewCount }})
                                                </span>
                                            @else
                                                <span class="material-symbols-outlined text-[14px] text-on-surface-variant">star_outline</span>
                                                <span class="text-on-surface-variant font-label-sm text-label-sm">New provider</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}" 
                                   class="w-full py-2 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-all text-center">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Pagination -->
            @if($jasas instanceof \Illuminate\Pagination\LengthAwarePaginator && $jasas->hasPages())
                <div class="mt-2xl flex items-center justify-center gap-sm">
                    {{-- Previous Page Link --}}
                    @if ($jasas->onFirstPage())
                        <button disabled class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant opacity-50 cursor-not-allowed">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                    @else
                        <a href="{{ $jasas->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($jasas->getUrlRange(1, $jasas->lastPage()) as $page => $url)
                        @if ($page == $jasas->currentPage())
                            <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-label-md text-label-md shadow-md">
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors font-label-md text-label-md">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($jasas->hasMorePages())
                        <a href="{{ $jasas->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </a>
                    @else
                        <button disabled class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant opacity-50 cursor-not-allowed">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="w-full py-xl px-margin-mobile md:px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant">
    <div class="flex flex-col gap-md">
        <span class="font-headline-md text-headline-md font-bold text-on-surface">Tukar Jasa</span>
        <p class="text-on-surface-variant font-body-sm text-body-sm max-w-[280px]">The premier community-driven marketplace for professional skill-sharing and collaboration.</p>
    </div>
    <div class="flex flex-col gap-sm">
        <h4 class="font-label-md text-label-md text-primary mb-sm">Resources</h4>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Privacy Policy</a>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Terms of Service</a>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Cookie Policy</a>
    </div>
    <div class="flex flex-col gap-sm">
        <h4 class="font-label-md text-label-md text-primary mb-sm">Community</h4>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="#">Community Guidelines</a>
        <a class="text-on-surface-variant font-body-sm text-body-sm hover:text-secondary transition-colors" href="{{ route('user.search') }}">Support</a>
    </div>
    <div class="flex flex-col gap-sm">
        <h4 class="font-label-md text-label-md text-primary mb-sm">Connect</h4>
        <div class="flex gap-md">
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">public</span>
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">mail</span>
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">share</span>
        </div>
        <p class="text-on-surface-variant font-body-sm text-body-sm mt-md">© {{ date('Y') }} Tukar Jasa Skill Exchange. All rights reserved.</p>
    </div>
</footer>

<style>
    /* Gradient Classes for Service Cards */
    .category-gradient-1 { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
    .category-gradient-2 { background: linear-gradient(135deg, #00447d 0%, #002d57 100%); }
    .category-gradient-3 { background: linear-gradient(135deg, #3730a3 0%, #544fc0 100%); }
    .category-gradient-4 { background: linear-gradient(135deg, #5a00c6 0%, #25005a 100%); }
    .category-gradient-5 { background: linear-gradient(135deg, #004883 0%, #001c39 100%); }
</style>

<script>
    // Micro-interaction for range slider (visual only since we use radio buttons for categories)
    const range = document.querySelector('input[type="range"]');
    if (range) {
        range.addEventListener('input', (e) => {
            const value = e.target.value;
            const display = e.target.nextElementSibling.lastElementChild;
            display.textContent = `${value} pts`;
        });
    }
</script>
</body>
</html>