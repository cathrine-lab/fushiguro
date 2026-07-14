<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => $jasa->nama_jasa . ' | Tukar Jasa'])
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .primary-gradient {
            background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%);
        }
        .secondary-shadow {
            box-shadow: 0 10px 15px -3px rgba(55, 48, 163, 0.05), 0 4px 6px -2px rgba(55, 48, 163, 0.02);
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Lightbox Overlay */
        .lightbox-overlay {
            position: fixed; inset: 0; z-index: 100; 
            background: rgba(0,0,0,0.9); backdrop-filter: blur(8px);
            display: flex; align-items: center; justify-content: center;
            cursor: zoom-out; opacity: 0; pointer-events: none; transition: opacity 0.3s;
        }
        .lightbox-overlay.active { opacity: 1; pointer-events: auto; }
        .lightbox-overlay img { max-width: 90%; max-height: 90%; object-fit: contain; border-radius: 12px; }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden flex flex-col min-h-screen">

    {{-- Header Global --}}
    @include('user.partials.header', ['title' => 'Detail Jasa'])

    {{-- Main Content Canvas --}}
    <main class="flex-1 max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop pt-24 pb-3xl">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            
            {{-- Left Column: Content (8 Columns) --}}
            <div class="lg:col-span-8 flex flex-col gap-xl">
                
                {{-- Hero Section --}}
                <section class="rounded-2xl overflow-hidden secondary-shadow border border-outline-variant bg-surface-container-lowest">
                    <div class="w-full h-[320px] md:h-[400px] primary-gradient flex items-center justify-center relative group">
                        <span class="material-symbols-outlined text-white/20 text-[160px] group-hover:scale-110 transition-transform duration-500">
                            {{ str_contains(strtolower($jasa->kategori->nama_kategori ?? ''), 'design') ? 'palette' : 'design_services' }}
                        </span>
                        <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-on-surface font-label-sm font-bold shadow-sm">
                            {{ $jasa->kategori->nama_kategori ?? 'Umum' }}
                        </div>
                    </div>
                    
                    <div class="p-xl md:p-2xl">
                        <h1 class="font-headline-lg text-headline-lg md:text-display-lg text-on-surface mb-md leading-tight">
                            {{ $jasa->nama_jasa }}
                        </h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed whitespace-pre-line">
                            {{ $jasa->deskripsi }}
                        </p>
                    </div>
                </section>

                {{-- Reviews Section (DIPERBAIKI & DIPERAMAN) --}}
                <section class="p-xl md:p-2xl bg-surface-container-lowest border border-outline-variant rounded-2xl secondary-shadow">
                    <div class="flex justify-between items-center mb-xl">
                        <h2 class="font-headline-md text-headline-md text-on-surface">Ulasan Klien</h2>
                        <div class="flex items-center gap-xs">
                            <span class="material-symbols-outlined text-[#FACC15]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-md text-label-md text-on-surface">
                                {{ number_format($avgRating ?? 0, 1) }} 
                                <span class="text-on-surface-variant">({{ $totalUlasan ?? 0 }} ulasan)</span>
                            </span>
                        </div>
                    </div>

                    @if(empty($ulasanList) || $ulasanList->count() === 0)
                        <div class="text-center py-xl text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl mb-2 opacity-40">rate_review</span>
                            <p>Belum ada ulasan untuk jasa ini. Jadilah yang pertama!</p>
                        </div>
                    @else
                        <div class="space-y-lg divide-y divide-outline-variant">
                            @foreach($ulasanList as $ulasan)
                                <div class="pt-lg first:pt-0">
                                    <div class="flex items-center gap-md mb-sm">
                                        <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold flex-shrink-0">
                                            {{ strtoupper(substr($ulasan->pengguna->nama ?? 'U', 0, 1)) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-label-md text-label-md text-on-surface truncate">{{ $ulasan->pengguna->nama ?? 'Pengguna' }}</h4>
                                            <p class="font-label-sm text-label-sm text-on-surface-variant">{{ \Carbon\Carbon::parse($ulasan->created_at)->diffForHumans() }}</p>
                                        </div>
                                        <div class="flex gap-0.5 flex-shrink-0">
                                            @for($i=1; $i<=5; $i++)
                                                <span class="material-symbols-outlined text-[16px] {{ $i <= ($ulasan->rating ?? 0) ? 'text-[#FACC15]' : 'text-outline-variant' }}" 
                                                      style="font-variation-settings: 'FILL' {{ $i <= ($ulasan->rating ?? 0) ? 1 : 0 }}">star</span>
                                            @endfor
                                        </div>
                                    </div>
                                    @if(!empty($ulasan->komentar))
                                        <p class="font-body-md text-body-md text-on-surface-variant italic mt-2">"{{ $ulasan->komentar }}"</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            </div>

            {{-- Right Column: Sticky Sidebar (4 Columns) --}}
            <div class="lg:col-span-4">
                <div class="sticky top-24 flex flex-col gap-lg">
                    
                    {{-- Pricing & Action Card --}}
                    <div class="p-xl bg-surface-container-lowest border border-outline-variant rounded-2xl secondary-shadow">
                        <div class="flex items-center justify-between mb-xl">
                            <div class="flex flex-col">
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Harga Jasa</span>
                                <span class="font-display-lg text-display-lg text-primary leading-none">
                                    {{ number_format($jasa->poin) }} 
                                    <span class="text-headline-sm font-headline-sm text-on-surface-variant">Pts</span>
                                </span>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary">payments</span>
                            </div>
                        </div>

                        <div class="space-y-md mb-xl">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
                                <span class="font-body-sm text-body-sm text-on-surface">Komunikasi Langsung</span>
                            </div>
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
                                <span class="font-body-sm text-body-sm text-on-surface">Sistem Poin Fleksibel</span>
                            </div>
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary text-[20px]">check_circle</span>
                                <span class="font-body-sm text-body-sm text-on-surface">Garansi Kepuasan</span>
                            </div>
                        </div>

                        @php $isOwner = Auth::id() === $jasa->id_pengguna; @endphp

                        @if($isOwner)
                            <a href="{{ route('user.jasa.edit', $jasa->id_jasa) }}" 
                               class="w-full flex items-center justify-center gap-sm bg-surface-container-high hover:bg-outline-variant text-on-surface py-md rounded-xl font-label-md text-label-md transition-all mb-md">
                                <span class="material-symbols-outlined">edit</span>
                                Edit Jasa Ini
                            </a>
                        @else
                            <a href="{{ route('user.transaksi.create', ['id_jasa' => $jasa->id_jasa]) }}" 
                                class="w-full primary-gradient text-white py-md rounded-xl font-headline-sm text-headline-sm shadow-lg hover:opacity-90 active:scale-[0.98] transition-all mb-md flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">swap_horiz</span>
                                Request Jasa Ini
                            </a>
                            
                            @if(!empty($jasa->pemilik->no_hp))
                                <a class="w-full flex items-center justify-center gap-sm bg-surface-container-high hover:bg-outline-variant text-on-surface py-md rounded-xl font-label-md text-label-md transition-all" 
                                   href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $jasa->pemilik->no_hp) }}" target="_blank">
                                    <span class="material-symbols-outlined">chat</span>
                                    Hubungi via WhatsApp
                                </a>
                            @endif
                        @endif
                    </div>

                    {{-- Provider Profile Card --}}
                    <div class="p-xl bg-surface-container-lowest border border-outline-variant rounded-2xl secondary-shadow">
                        <div class="flex flex-col items-center text-center">
                            <div class="relative mb-md">
                                <div class="w-24 h-24 rounded-full bg-primary flex items-center justify-center text-white font-bold text-3xl border-4 border-surface-container-low shadow-sm">
                                    {{ strtoupper(substr($jasa->pemilik->nama ?? 'U', 0, 1)) }}
                                </div>
                                <span class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 border-2 border-white rounded-full"></span>
                            </div>
                            
                            <a href="{{ route('user.profil.show', $jasa->pemilik->id_pengguna) }}" 
                               class="font-headline-sm text-headline-sm text-on-surface hover:text-primary transition-colors">
                                {{ $jasa->pemilik->nama ?? 'Pengguna' }}
                            </a>
                            <p class="font-label-md text-label-md text-secondary mb-md">Member • {{ number_format($jasa->pemilik->poin ?? 0) }} pts</p>
                            
                            <p class="font-body-sm text-body-sm text-on-surface-variant mb-xl line-clamp-3">
                                {{ $jasa->pemilik->bio ?? 'Pengguna Aktif di Platform Tukar Jasa' }}
                            </p>

                            <div class="w-full grid grid-cols-2 gap-sm pt-xl border-t border-outline-variant">
                                <div class="flex flex-col">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant">Total Jasa</span>
                                    <span class="font-headline-sm text-headline-sm text-on-surface">{{ $jasa->pemilik->jasa->count() }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-label-sm text-label-sm text-on-surface-variant">Bergabung</span>
                                    <span class="font-headline-sm text-headline-sm text-on-surface">{{ \Carbon\Carbon::parse($jasa->pemilik->created_at)->format('M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="w-full py-xl px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant">
        <div class="md:col-span-1">
            <span class="font-headline-md text-headline-md font-bold text-on-surface mb-md block">Tukar Jasa</span>
            <p class="font-body-sm text-body-sm text-on-surface-variant mb-xl">Empowering local talent through the art of skill exchange. Join our community today.</p>
        </div>
        <div>
            <h4 class="font-label-md text-label-md text-primary mb-lg">Platform</h4>
            <ul class="space-y-sm">
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Privacy Policy</a></li>
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Terms of Service</a></li>
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Cookie Policy</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-label-md text-label-md text-primary mb-lg">Community</h4>
            <ul class="space-y-sm">
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Community Guidelines</a></li>
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Success Stories</a></li>
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Events</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-label-md text-label-md text-primary mb-lg">Support</h4>
            <ul class="space-y-sm">
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Help Center</a></li>
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Safety Tips</a></li>
                <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Contact Support</a></li>
            </ul>
        </div>
        <div class="md:col-span-4 mt-xl pt-lg border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-md">
            <p class="font-body-sm text-body-sm text-on-surface-variant">© {{ date('Y') }} Tukar Jasa Skill Exchange. All rights reserved.</p>
            <div class="flex gap-lg">
                <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">language</span>
                <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">share</span>
            </div>
        </div>
    </footer>

    {{-- Lightbox Overlay --}}
    <div id="lightbox" class="lightbox-overlay" onclick="this.classList.remove('active')">
        <img id="lightbox-img" src="" alt="Preview">
    </div>

    <script>
        // Micro-interaction for gallery images
        document.querySelectorAll('.gallery-img').forEach(img => {
            img.addEventListener('click', () => {
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                lightboxImg.src = img.src;
                lightbox.classList.add('active');
            });
        });
    </script>
</body>
</html>