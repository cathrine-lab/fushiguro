<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Categories | Tukar Jasa Skill Exchange</title>
    
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
                        "surface-variant": "#e0e3e5", "surface-dim": "#d8dadc", "on-primary": "#ffffff",
                        "on-error": "#ffffff", "on-tertiary-fixed": "#001c39", "surface-container-lowest": "#ffffff",
                        "error-container": "#ffdad6", "tertiary-fixed-dim": "#a4c9ff", "on-tertiary": "#ffffff",
                        "on-surface-variant": "#464553", "surface": "#f7f9fb", "primary-fixed-dim": "#c3c0ff",
                        "tertiary": "#002d57", "on-primary-fixed-variant": "#3b35a7", "background": "#f7f9fb",
                        "surface-tint": "#544fc0", "on-tertiary-fixed-variant": "#004883", "secondary": "#712ae2",
                        "secondary-container": "#8a4cfc", "on-background": "#191c1e", "on-secondary-container": "#fffbff",
                        "primary-container": "#3730a3", "on-error-container": "#93000a", "inverse-surface": "#2d3133",
                        "surface-container-highest": "#e0e3e5", "surface-container-high": "#e6e8ea",
                        "secondary-fixed": "#eaddff", "error": "#ba1a1a", "on-secondary": "#ffffff",
                        "surface-bright": "#f7f9fb", "on-secondary-fixed": "#25005a", "outline": "#777584",
                        "inverse-primary": "#c3c0ff", "secondary-fixed-dim": "#d2bbff", "on-surface": "#191c1e",
                        "on-tertiary-container": "#78b2ff", "on-primary-fixed": "#001569", "primary-fixed": "#e2dfff",
                        "tertiary-fixed": "#d4e3ff", "surface-container": "#eceef0", "surface-container-low": "#f2f4f6",
                        "outline-variant": "#c8c4d5", "inverse-on-surface": "#eff1f3", "tertiary-container": "#00447d",
                        "primary": "#1f108e", "on-primary-container": "#a9a7ff"
                    },
                    "borderRadius": { "DEFAULT": "0.25rem", "lg": "12px", "xl": "16px", "full": "9999px" },
                    "spacing": {
                        "2xl": "48px", "3xl": "64px", "xs": "4px", "lg": "24px", "xl": "32px", "md": "16px",
                        "base": "4px", "gutter": "24px", "sm": "8px", "margin-desktop": "40px", "margin-mobile": "16px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"], "label-sm": ["Inter"], "headline-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"], "display-lg": ["Inter"], "headline-lg": ["Inter"],
                        "body-sm": ["Inter"], "body-lg": ["Inter"], "body-md": ["Inter"], "headline-sm": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.02em", "fontWeight": "500"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-lg": ["32px", {"lineHeight": "1.25", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
        .category-card-shadow {
            box-shadow: 0 10px 15px -3px rgba(55, 48, 163, 0.05), 0 4px 6px -2px rgba(55, 48, 163, 0.02);
        }
    </style>
</head>
<body class="bg-surface text-on-surface">

<!-- Top Navigation Bar -->
<header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-mobile md:px-margin-desktop h-16 border-b border-outline-variant shadow-sm">
    <div class="flex items-center gap-xl">
        <a href="{{ route('user.dashboard') }}" class="font-headline-md text-headline-md font-bold text-primary">Tukar Jasa</a>
        <nav class="hidden md:flex gap-lg">
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" 
               href="{{ route('user.jasa.browse') }}">Explore</a>
            <a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" 
               href="{{ route('user.transaksi.index') }}">Transaksi</a>
            <a class="font-body-md text-body-md text-primary font-bold border-b-2 border-primary" 
               href="{{ route('user.kategori.index') }}">Kategori</a>
        </nav>
    </div>
    <div class="flex items-center gap-md">
        <div class="hidden lg:flex items-center gap-md">
            <a href="{{ route('user.search') }}" class="material-symbols-outlined text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full">search</a>
            <a href="{{ route('user.wallet.index') }}" class="material-symbols-outlined text-on-surface-variant p-sm hover:bg-surface-container-high rounded-full relative">
                account_balance_wallet
            </a>
        </div>
        <div class="h-8 w-[1px] bg-outline-variant mx-sm hidden lg:block"></div>
        <a href="{{ route('user.profil.show', Auth::id()) }}" 
           class="flex items-center gap-sm hover:bg-surface-container rounded-xl px-2 py-1 transition-colors">
            <div class="h-9 w-9 rounded-full primary-gradient flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
            </div>
            <div class="hidden md:block">
                <p class="font-label-sm text-label-sm text-on-surface leading-tight">{{ Auth::user()->nama }}</p>
                <p class="font-label-sm text-label-sm text-on-surface-variant leading-tight">{{ Auth::user()->poin }} pts</p>
            </div>
        </a>
    </div>
</header>

<main class="pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-[1280px] mx-auto">
    
    <!-- Hero Section -->
    <section class="mb-2xl text-center md:text-left flex flex-col md:flex-row md:items-end justify-between gap-lg">
        <div class="max-w-2xl">
            <h2 class="font-display-lg text-display-lg mb-md text-primary">Jelajahi Keterampilan</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant">
                Temukan individu berbakat yang siap bertukar keahlian. Mulai dari pemrograman hingga penulisan kreatif, temukan partner yang tepat untuk saling berbagi keterampilan.
            </p>
        </div>
        <div class="flex flex-col gap-sm w-full md:w-auto">
            <div class="relative">
                <span class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-outline">search</span>
                <input id="categorySearch" type="text" 
                    class="w-full md:w-[320px] pl-12 pr-md py-sm rounded-xl border border-outline-variant focus:border-primary focus:ring-4 focus:ring-primary/20 outline-none transition-all bg-surface-container-lowest" 
                    placeholder="Search categories..." />
            </div>
        </div>
    </section>

    <!-- Categories Bento Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter mb-2xl" id="categoryGrid">
        @forelse($kategoris as $kat)
            @php
                // Dynamic icon mapping based on category name keywords
                $iconMap = [
                    'programming' => 'code', 'tech' => 'code', 'development' => 'code',
                    'design' => 'palette', 'graphic' => 'brush', 'art' => 'palette',
                    'writing' => 'edit_note', 'translation' => 'translate', 'language' => 'translate',
                    'marketing' => 'campaign', 'seo' => 'analytics', 'business' => 'business_center',
                    'music' => 'music_note', 'audio' => 'audiotrack',
                    'lifestyle' => 'self_improvement', 'fitness' => 'fitness_center',
                    'teaching' => 'school', 'education' => 'auto_stories',
                    'consulting' => 'psychology', 'legal' => 'gavel', 'finance' => 'account_balance',
                ];
                
                $katNameLower = strtolower($kat->nama_kategori);
                $icon = 'category';
                foreach ($iconMap as $key => $ic) {
                    if (str_contains($katNameLower, $key)) { $icon = $ic; break; }
                }
                
                // Alternating accent colors for variety
                $colorIndex = $loop->index % 3;
                $accentColor = match($colorIndex) {
                    0 => 'primary',
                    1 => 'secondary',
                    2 => 'tertiary',
                };
            @endphp
            
            <a href="{{ route('user.jasa.browse', ['kategori' => $kat->id_kategori]) }}" 
               class="group bg-surface-container-lowest p-lg rounded-xl border border-outline-variant category-card-shadow hover:border-primary hover:-translate-y-1 transition-all duration-300 cursor-pointer block">
                <div class="w-12 h-12 rounded-lg bg-{{ $accentColor }}/10 flex items-center justify-center mb-md group-hover:bg-{{ $accentColor }}/20 transition-colors">
                    <span class="material-symbols-outlined text-{{ $accentColor }} text-[28px]">{{ $icon }}</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm mb-xs">{{ $kat->nama_kategori }}</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md line-clamp-2">
                    {{ $kat->deskripsi ?? 'Various professional services and skills available in this category.' }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="font-label-sm text-label-sm text-secondary bg-secondary/10 px-sm py-1 rounded-full">
                        {{ number_format($kat->jasas_count ?? 0) }} services
                    </span>
                    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">arrow_forward</span>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-2xl text-on-surface-variant">
                <span class="material-symbols-outlined text-4xl mb-4 opacity-40">category</span>
                <p>Belum ada kategori</p>
            </div>
        @endforelse
    </section>

    <!-- CTA Section -->
    <section class="relative bg-primary-container rounded-2xl overflow-hidden p-xl md:p-2xl text-center">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
        <div class="relative z-10">
            <h3 class="font-headline-lg text-headline-lg text-on-primary-container mb-md">Belum menemukan yang Anda cari?</h3>
            <p class="font-body-md text-body-md text-on-primary-container/80 mb-xl max-w-xl mx-auto">
                Jelajahi berbagai keterampilan dan layanan dari komunitas kami di seluruh dunia.
            </p>
            <a href="{{ route('user.jasa.browse') }}" 
               class="inline-block primary-gradient text-white px-3xl py-md rounded-xl font-label-md text-label-md shadow-lg hover:shadow-xl active:scale-95 transition-all">
                Jelajahi Semua Layanan
            </a>
        </div>
    </section>

    <!-- Featured Collections (Static Showcase) -->
    <section class="mt-3xl">
        <div class="flex items-center justify-between mb-xl">
            <h3 class="font-headline-lg text-headline-lg text-primary">Koleksi Pilihan</h3>
            <a class="text-primary font-label-md text-label-md hover:underline flex items-center gap-xs" 
               href="{{ route('user.jasa.browse') }}">
                Lihat semua kategori 
                <span class="material-symbols-outlined text-[18px]">trending_flat</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
            <!-- Large Featured Card -->
            <a href="{{ route('user.jasa.browse') }}" 
               class="md:col-span-8 group relative h-[400px] rounded-2xl overflow-hidden cursor-pointer shadow-lg block">
                <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" 
                     style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-xl">
                    <span class="bg-primary text-white text-[10px] uppercase font-bold px-sm py-1 rounded-md mb-sm inline-block">Trending</span>
                    <h4 class="text-white font-headline-md text-headline-md mb-xs">Tech & Development</h4>
                    <p class="text-white/80 font-body-sm text-body-sm">Master the technologies of the future through peer learning.</p>
                </div>
            </a>
            
            <!-- Smaller Cards Stack -->
            <div class="md:col-span-4 flex flex-col gap-gutter">
                <a href="{{ route('user.jasa.browse') }}" 
                   class="flex-1 group relative rounded-2xl overflow-hidden cursor-pointer shadow-md block min-h-[180px]">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" 
                         style="background-image: url('https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-lg">
                        <h4 class="text-white font-headline-sm text-headline-sm">Digital Art & Design</h4>
                    </div>
                </a>
                <a href="{{ route('user.jasa.browse') }}" 
                   class="flex-1 group relative rounded-2xl overflow-hidden cursor-pointer shadow-md block min-h-[180px]">
                    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-500" 
                         style="background-image: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-lg">
                        <h4 class="text-white font-headline-sm text-headline-sm">Business Strategy</h4>
                    </div>
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="w-full py-xl px-margin-mobile md:px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant">
    <div class="md:col-span-1">
        <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md">Tukar Jasa</h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant mb-xl">The world's leading community for skills exchange and peer-to-peer professional growth.</p>
        <div class="flex gap-md">
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">public</span>
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">groups</span>
            <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">chat_bubble</span>
        </div>
    </div>
    <div>
        <h5 class="font-label-md text-label-md text-primary mb-lg">Platform</h5>
        <ul class="space-y-sm">
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="{{ route('user.jasa.browse') }}">Browse Skills</a></li>
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="{{ route('user.jasa.create') }}">Post a Service</a></li>
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Community Forum</a></li>
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Events</a></li>
        </ul>
    </div>
    <div>
        <h5 class="font-label-md text-label-md text-primary mb-lg">Legal</h5>
        <ul class="space-y-sm">
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Privacy Policy</a></li>
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Terms of Service</a></li>
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Cookie Policy</a></li>
            <li><a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Community Guidelines</a></li>
        </ul>
    </div>
    <div>
        <h5 class="font-label-md text-label-md text-primary mb-lg">Newsletter</h5>
        <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">Get the latest skill updates in your inbox.</p>
        <div class="flex gap-xs">
            <input class="bg-surface p-sm rounded-lg border border-outline-variant text-body-sm outline-none focus:border-primary w-full" placeholder="Email address" type="email"/>
            <button class="primary-gradient text-white p-sm rounded-lg material-symbols-outlined">send</button>
        </div>
    </div>
    <div class="md:col-span-4 pt-xl mt-xl border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-md">
        <span class="font-body-sm text-body-sm text-on-surface-variant">© {{ date('Y') }} Tukar Jasa Skill Exchange. All rights reserved.</span>
        <div class="flex gap-xl">
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary" href="{{ route('user.search') }}">Support</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary" href="{{ route('user.search') }}">Help Center</a>
        </div>
    </div>
</footer>

<script>
    // Client-side Search for Categories
    const searchInput = document.getElementById('categorySearch');
    const categoryCards = document.querySelectorAll('#categoryGrid > a');

    if (searchInput && categoryCards.length > 0) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            let visibleCount = 0;
            
            categoryCards.forEach(card => {
                const categoryName = card.querySelector('h3')?.textContent.toLowerCase() || '';
                const description = card.querySelector('p')?.textContent.toLowerCase() || '';
                
                if (categoryName.includes(query) || description.includes(query)) {
                    card.style.display = 'block';
                    setTimeout(() => { card.style.opacity = '1'; }, 10);
                    visibleCount++;
                } else {
                    card.style.opacity = '0';
                    setTimeout(() => { 
                        if (!card.matches(':hover')) card.style.display = 'none'; 
                    }, 300);
                }
            });

            // Show empty state message if no results
            let emptyMsg = document.getElementById('noResultsMsg');
            if (visibleCount === 0 && query !== '') {
                if (!emptyMsg) {
                    emptyMsg = document.createElement('div');
                    emptyMsg.id = 'noResultsMsg';
                    emptyMsg.className = 'col-span-full text-center py-2xl text-on-surface-variant';
                    emptyMsg.innerHTML = '<span class="material-symbols-outlined text-4xl mb-4 opacity-40">search_off</span><p>No categories match your search.</p>';
                    document.getElementById('categoryGrid').appendChild(emptyMsg);
                }
                emptyMsg.style.display = 'block';
            } else if (emptyMsg) {
                emptyMsg.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>