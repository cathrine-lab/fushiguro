<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tukar Jasa - Ubah Keahlian Menjadi Nilai</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; display:inline-block; line-height:1; }
        body { font-family:'Inter',sans-serif; background-color:#f7f9fb; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(226, 232, 240, 0.8); }
        .gradient-text { background: linear-gradient(135deg, #544fc0 0%, #712ae2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .primary-gradient { background: linear-gradient(135deg, #544fc0 0%, #712ae2 100%); }
        
        /* Animations */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .reveal { opacity: 0; transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1); }
        .reveal.active { opacity: 1; animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        .shimmer { position: relative; overflow: hidden; }
        .shimmer::after { content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: linear-gradient(to bottom right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%); transform: rotate(45deg); animation: shimmerEffect 3s infinite; }
        @keyframes shimmerEffect { 0% { transform: translateX(-150%) rotate(45deg); } 100% { transform: translateX(150%) rotate(45deg); } }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
        .animate-bounce-slow { animation: bounce-slow 4s ease-in-out infinite; }
        @keyframes bounce-slow { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        .card-interactive { transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease; }
        .card-interactive:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); }
    </style>
    <script id="tailwind-config">
        tailwind.config = { darkMode:"class", theme:{ extend:{ "colors":{ "inverse-surface":"#2d3133","on-secondary":"#ffffff","on-tertiary-container":"#78b2ff","inverse-on-surface":"#eff1f3","error-container":"#ffdad6","tertiary-fixed":"#d4e3ff","surface-container-low":"#f2f4f6","on-primary":"#ffffff","tertiary-container":"#00447d","inverse-primary":"#c3c0ff","surface-container-highest":"#e0e3e5","on-tertiary":"#ffffff","on-secondary-fixed-variant":"#5a00c6","on-secondary-container":"#fffbff","on-primary-fixed":"#0f0069","background":"#f7f9fb","on-error":"#ffffff","on-secondary-fixed":"#25005a","secondary-fixed-dim":"#d2bbff","surface-tint":"#544fc0","secondary-container":"#8a4cfc","outline-variant":"#c8c4d5","secondary":"#712ae2","outline":"#777584","surface-container-high":"#e6e8ea","on-primary-fixed-variant":"#3b35a7","surface-variant":"#e0e3e5","secondary-fixed":"#eaddff","on-surface-variant":"#464553","primary-container":"#3730a3","tertiary-fixed-dim":"#a4c9ff","surface-dim":"#d8dadc","on-tertiary-fixed-variant":"#004883","primary-fixed-dim":"#c3c0ff","tertiary":"#002d57","surface-bright":"#f7f9fb","on-surface":"#191c1e","on-primary-container":"#a9a7ff","primary":"#1f108e","error":"#ba1a1a","primary-fixed":"#e2dfff","on-background":"#191c1e","surface":"#f7f9fb","surface-container-lowest":"#ffffff","on-error-container":"#93000a","surface-container":"#eceef0","on-tertiary-fixed":"#001c39" }, "borderRadius":{ "DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px" }, "spacing":{ "sm":"8px","xl":"32px","2xl":"48px","margin-desktop":"40px","margin-mobile":"16px","base":"4px","md":"16px","lg":"24px","gutter":"24px","3xl":"64px","xs":"4px" }, "fontFamily":{ "body-lg":["Inter"],"headline-sm":["Inter"],"label-md":["Inter"],"body-md":["Inter"],"headline-md":["Inter"],"headline-lg-mobile":["Inter"],"headline-lg":["Inter"],"body-sm":["Inter"],"display-lg":["Inter"],"label-sm":["Inter"] }, "fontSize":{ "body-lg":["18px",{"lineHeight":"1.6","fontWeight":"400"}],"headline-sm":["20px",{"lineHeight":"1.4","fontWeight":"600"}],"label-md":["14px",{"lineHeight":"1","letterSpacing":"0.01em","fontWeight":"600"}],"body-md":["16px",{"lineHeight":"1.6","fontWeight":"400"}],"headline-md":["24px",{"lineHeight":"1.3","fontWeight":"600"}],"headline-lg-mobile":["24px",{"lineHeight":"1.3","fontWeight":"600"}],"headline-lg":["32px",{"lineHeight":"1.25","letterSpacing":"-0.01em","fontWeight":"600"}],"body-sm":["14px",{"lineHeight":"1.5","fontWeight":"400"}],"display-lg":["48px",{"lineHeight":"1.2","letterSpacing":"-0.02em","fontWeight":"700"}],"label-sm":["12px",{"lineHeight":"1","letterSpacing":"0.02em","fontWeight":"500"}] } } } }
    </script>
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden">

<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-md flex justify-between items-center px-margin-desktop h-16 border-b border-outline-variant shadow-sm transition-all duration-300">
    <div class="flex items-center gap-xl">
        <span class="font-headline-md text-headline-md font-bold text-primary cursor-pointer">Tukar Jasa</span>
        <div class="hidden md:flex items-center gap-lg">
            <a class="text-primary font-bold border-b-2 border-primary font-body-md text-body-md py-1" href="{{ route('user.jasa.browse') }}">Explore</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md text-body-md" href="#how-it-works">How it Works</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-body-md text-body-md" href="#categories">Categories</a>
        </div>
    </div>
    <div class="flex items-center gap-md">
    <div class="hidden lg:flex items-center bg-surface-container-low rounded-full px-md py-xs border border-outline-variant mr-md focus-within:ring-2 focus-within:ring-primary/20 transition-all">
        <span class="material-symbols-outlined text-on-surface-variant text-[20px]">search</span>
        <form action="{{ route('user.search') }}" method="GET" class="flex items-center w-full">
            <input name="q" class="bg-transparent border-none focus:ring-0 text-body-sm w-48" placeholder="Cari jasa..." type="text"/>
        </form>
    </div>
    
    {{-- TOMBOL LOGIN & REGISTER (TANPA @auth/@guest) --}}
    <a href="{{ route('login') }}" class="hidden sm:block text-on-surface-variant hover:text-primary transition-colors font-label-md">Login</a>
    <a href="{{ route('register') }}" class="primary-gradient text-white px-lg py-sm rounded-xl font-label-md shadow-lg shadow-primary/20 hover:shadow-primary/30 active:scale-95 transition-all">Register</a>
</div>
</nav>

<main class="mt-16">
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center pt-xl overflow-hidden reveal">
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-fixed-dim/30 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 -left-48 w-[600px] h-[600px] bg-secondary-fixed/20 rounded-full blur-[120px]"></div>
        </div>
        <div class="container mx-auto px-margin-desktop grid grid-cols-1 lg:grid-cols-2 gap-xl items-center relative z-10">
            <div class="max-w-2xl">
                <span class="inline-block px-md py-xs rounded-full bg-primary-fixed text-on-primary-fixed font-label-md mb-md">#1 Skill Exchange Platform</span>
                <h1 class="font-display-lg text-display-lg mb-lg leading-tight tracking-tight">Ubah Keahlian Menjadi <span class="gradient-text">Nilai</span></h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-xl leading-relaxed">Bergabunglah dengan komunitas profesional yang saling bertukar jasa tanpa uang tunai. Bagikan keahlianmu, kumpulkan poin, dan dapatkan layanan dari ahli lainnya secara gratis.</p>
                
                {{-- Search Form Dinamis --}}
                <div class="bg-white p-2 rounded-2xl shadow-xl border border-outline-variant flex flex-col md:flex-row gap-2 max-w-xl">
                    <div class="flex-1 flex items-center px-md border-b md:border-b-0 md:border-r border-outline-variant py-2">
                        <span class="material-symbols-outlined text-primary mr-sm">search</span>
                        <form action="{{ route('user.search') }}" method="GET" class="w-full flex items-center">
                            <input name="q" class="w-full bg-transparent border-none focus:ring-0 text-body-md" placeholder="Cari jasa: UI Designer, Python..." type="text"/>
                        </form>
                    </div>
                    <button onclick="document.querySelector('form[action*=&quot;search&quot;]').submit()" class="primary-gradient text-white px-xl py-md rounded-xl font-label-md whitespace-nowrap shimmer active:scale-95 transition-all">Cari Sekarang</button>
                </div>

                <div class="mt-xl flex items-center gap-lg">
                    <div class="flex -space-x-3">
                        {{-- Avatar Statis sebagai Placeholder Komunitas --}}
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover hover:scale-110 transition-transform cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjWtaXuu-AAcW1-MmjgXZRf_18TWo1cKYsw7eB5RcZ_8seGreAjBT6Rtv-huVsYLOckNVKnUV3rKgGrNlVl4Kz5Hye32dgifVwoFCnJSrKRfqcys2c1b8FCCWHv-k_1vJatQ1NSw57GaPsMnduGeK-kSHnnyMvnRg1qqDMcFF9zKPjxT0kxu3oK2e2Y36Fcr2c99TZzaDYslO0rWf4MAekTJAgiOa2Z_yKnxzoAG9NGco_BcDb4pIBPu8BOo96Xiupr7gWUhKIJTag"/>
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover hover:scale-110 transition-transform cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuASXicNoAbDpV1mbTZLrYEMamRAgoOpv2xWaieIQkzzv6bJEIAuiWP19htkFj9fEyUjhhtIb4V_uo0UE7OsVtEM5N8oCUqE53p2Z6WEfn6G-dcPTSyTCPmvYocondDkfn1D4KM7BvIxtH4WLpDozUTOWgkHo6lRzBgZIZmiE3quEyOyDRjyoPRxw3dEt4XhE0RWm7QSX5gmv3ydsvw_ETq1w5YwyWw3nHcICZqlKYsH7OIU73BfKkgvHiaQ-g861RnmSmZWJKPbiS41"/>
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover hover:scale-110 transition-transform cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRnh7bP-zkRofIdtjNY0F_EmsHJa32yUDMn-_-NdSdJLp85Y2jjRNaGDzWD07T2E5NwsNewYeVSwL1y6A2dfBfp_1byEjtNs-LUvt9Kyp2ZWCi6KvdaMNbFN8zUe7hn-m7w2CU1TFDhqGwBkatAGq-0k6CG3rD7ZO5EUOjDsnaJG0uPC3cEMiYuyz8eVTs7lYMM8mI0VpEGo_XKoCRfM_1UX0I4P1gU06ycmBQItBGwn_Jkj2v2p8YeelGENtSofq7nEic0k3DGBy5"/>
                    </div>
                    <p class="text-body-sm text-on-surface-variant font-medium">Join {{ number_format($stats['users']) }}+ professionals exchanging skills daily</p>
                </div>
            </div>
            <div class="hidden lg:block relative">
                <div class="relative z-10 p-lg glass-card rounded-[40px] shadow-2xl animate-float">
                    <img class="rounded-[32px] w-full shadow-lg h-[500px] object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-4y1me8ZH4N15wcTbeQ07d7tDzewWLpy5fqF3M3dvVlTRmwv1XWHWJWRCK-gzgP4Fs7cNjJm_23ZOG0VTudSAR8opuXxEn9ZFY4B9or7z9RP2U1heI-7Gxmfx5-RGW5kd2OaHBrECbdkrhkBZPmiISUuaXMcnaDt_rSjMOmiMpX-R5fuzkssTyMLa5AZekUaeTk-nLgmU_PqGJROTiYGWLj-uNqVDfT4TQcFRMM4xfilJaoGUEvOFrnW3MXNBKNsrCAqlI-RhrfkO"/>
                </div>
                <div class="absolute -bottom-10 -left-10 z-20 glass-card p-lg rounded-2xl shadow-xl flex items-center gap-md animate-bounce-slow">
                    <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center"><span class="material-symbols-outlined text-white">bolt</span></div>
                    <div>
                        <p class="text-label-sm text-on-surface-variant">Active Exchanges</p>
                        <p class="text-headline-sm font-bold text-primary">{{ number_format($stats['transactions']) }}+</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Categories (DINAMIS) -->
    <section id="categories" class="py-3xl bg-surface-container-lowest reveal">
        <div class="container mx-auto px-margin-desktop">
            <div class="flex justify-between items-end mb-xl">
                <div class="max-w-xl">
                    <h2 class="font-headline-lg text-headline-lg mb-sm">Kategori Terpopuler</h2>
                    <p class="text-on-surface-variant">Temukan ribuan keahlian yang siap kamu tukarkan hari ini.</p>
                </div>
                <a class="text-primary font-label-md flex items-center gap-xs hover:underline transition-all" href="{{ route('user.jasa.browse') }}">Lihat Semua <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-lg">
                @forelse($kategoriPopuler as $kat)
                    @php
                        // Mapping ikon & warna berdasarkan nama kategori agar tetap estetik
                        $iconMap = [
                            'design' => ['palette', 'bg-primary-fixed', 'text-primary'],
                            'programming' => ['code', 'bg-secondary-fixed', 'text-secondary'],
                            'writing' => ['edit_note', 'bg-tertiary-fixed', 'text-tertiary-container'],
                            'marketing' => ['campaign', 'bg-error-container', 'text-error'],
                        ];
                        $slug = Str::slug($kat->nama_kategori);
                        $config = $iconMap[$slug] ?? ['category', 'bg-surface-container-high', 'text-on-surface'];
                    @endphp
                    
                    <a href="{{ route('user.jasa.browse', ['kategori' => $kat->id_kategori]) }}" class="group cursor-pointer block">
                        <div class="bg-white border border-outline-variant p-xl rounded-[24px] card-interactive text-center h-full">
                            <div class="w-16 h-16 rounded-2xl {{ $config[1] }} mx-auto mb-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined {{ $config[2] }} text-[32px]">{{ $config[0] }}</span>
                            </div>
                            <h3 class="font-headline-sm text-headline-sm mb-xs">{{ $kat->nama_kategori }}</h3>
                            <p class="text-body-sm text-on-surface-variant">{{ number_format($kat->jasas_count) }} Services</p>
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-center text-gray-400 py-10">Belum ada kategori tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-3xl reveal">
        <div class="container mx-auto px-margin-desktop text-center">
            <h2 class="font-headline-lg text-headline-lg mb-2xl">Bagaimana Cara Kerjanya?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-xl relative">
                <div class="hidden md:block absolute top-1/3 left-[20%] right-[20%] h-0.5 border-t-2 border-dashed border-outline-variant -z-10"></div>
                
                <div class="flex flex-col items-center group">
                    <div class="w-20 h-20 rounded-full bg-white border-4 border-primary-fixed shadow-lg flex items-center justify-center mb-lg relative transition-all duration-300 group-hover:scale-110 group-hover:border-primary">
                        <span class="absolute -top-2 -right-2 bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">1</span>
                        <span class="material-symbols-outlined text-primary text-[40px]">upload_file</span>
                    </div>
                    <h3 class="font-headline-sm mb-md transition-colors group-hover:text-primary">Offer Skill</h3>
                    <p class="text-on-surface-variant max-w-[280px]">Posting keahlian yang kamu miliki, mulai dari coding hingga memasak.</p>
                </div>
                
                <div class="flex flex-col items-center group">
                    <div class="w-20 h-20 rounded-full bg-white border-4 border-secondary-fixed shadow-lg flex items-center justify-center mb-lg relative transition-all duration-300 group-hover:scale-110 group-hover:border-secondary">
                        <span class="absolute -top-2 -right-2 bg-secondary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">2</span>
                        <span class="material-symbols-outlined text-secondary text-[40px]">stars</span>
                    </div>
                    <h3 class="font-headline-sm mb-md transition-colors group-hover:text-secondary">Earn Points</h3>
                    <p class="text-on-surface-variant max-w-[280px]">Dapatkan poin setiap kali kamu menyelesaikan jasa untuk anggota komunitas.</p>
                </div>
                
                <div class="flex flex-col items-center group">
                    <div class="w-20 h-20 rounded-full bg-white border-4 border-tertiary-fixed shadow-lg flex items-center justify-center mb-lg relative transition-all duration-300 group-hover:scale-110 group-hover:border-tertiary-container">
                        <span class="absolute -top-2 -right-2 bg-tertiary-container text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">3</span>
                        <span class="material-symbols-outlined text-tertiary-container text-[40px]">published_with_changes</span>
                    </div>
                    <h3 class="font-headline-sm mb-md transition-colors group-hover:text-tertiary-container">Exchange Services</h3>
                    <p class="text-on-surface-variant max-w-[280px]">Gunakan poinmu untuk mendapatkan jasa profesional yang kamu butuhkan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Services (DINAMIS) -->
    <section class="py-3xl bg-surface-container-low reveal">
        <div class="container mx-auto px-margin-desktop">
            <div class="flex justify-between items-center mb-xl">
                <h2 class="font-headline-lg text-headline-lg">Layanan Terpilih</h2>
                <a href="{{ route('user.jasa.browse') }}" class="text-primary font-label-md flex items-center gap-xs hover:underline">Lihat Semua <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
                @forelse($jasaTerpilih as $jasa)
                    <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}" class="bg-white rounded-2xl overflow-hidden border border-outline-variant card-interactive block group">
                        <div class="relative h-48 overflow-hidden bg-surface-container-high flex items-center justify-center">
                            {{-- Placeholder Gradient jika tidak ada gambar --}}
                            <div class="absolute inset-0 primary-gradient opacity-10 group-hover:opacity-20 transition-opacity"></div>
                            <span class="material-symbols-outlined text-primary/30 text-[64px] relative z-10">design_services</span>
                        </div>
                        <div class="p-lg">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-2 py-0.5 bg-primary-fixed text-on-primary-fixed rounded-full text-label-xs font-bold">{{ $jasa->kategori->nama_kategori }}</span>
                            </div>
                            <h4 class="font-headline-sm mb-sm line-clamp-1 group-hover:text-primary transition-colors">{{ $jasa->nama_jasa }}</h4>
                            <p class="text-body-sm text-on-surface-variant line-clamp-2 mb-lg">{{ Str::limit($jasa->deskripsi, 80) }}</p>
                            
                            <div class="flex justify-between items-center pt-lg border-t border-outline-variant">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-secondary flex items-center justify-center text-white text-[10px] font-bold">{{ strtoupper(substr($jasa->pemilik->nama, 0, 1)) }}</div>
                                    <span class="text-label-sm text-on-surface-variant">{{ $jasa->pemilik->nama }}</span>
                                </div>
                                <span class="text-primary font-bold text-label-md">{{ number_format($jasa->poin) }} Pts</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-10 bg-white rounded-2xl border border-dashed border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-gray-300 mb-2">inbox</span>
                        <p class="text-gray-500">Belum ada layanan yang diposting.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Community Statistics (DINAMIS) -->
    <section class="py-2xl primary-gradient text-white reveal">
        <div class="container mx-auto px-margin-desktop">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-xl text-center">
                <div class="transition-all duration-500 hover:scale-110">
                    <p class="text-display-lg font-black mb-xs">{{ number_format($stats['users']) }}+</p>
                    <p class="text-on-primary-container font-label-md uppercase tracking-wider">Users Joined</p>
                </div>
                <div class="transition-all duration-500 hover:scale-110">
                    <p class="text-display-lg font-black mb-xs">{{ number_format($stats['services']) }}+</p>
                    <p class="text-on-primary-container font-label-md uppercase tracking-wider">Services Listed</p>
                </div>
                <div class="transition-all duration-500 hover:scale-110">
                    <p class="text-display-lg font-black mb-xs">{{ number_format($stats['transactions']) }}+</p>
                    <p class="text-on-primary-container font-label-md uppercase tracking-wider">Transactions</p>
                </div>
                <div class="transition-all duration-500 hover:scale-110">
                    <p class="text-display-lg font-black mb-xs">{{ $stats['points'] }}</p>
                    <p class="text-on-primary-container font-label-md uppercase tracking-wider">Points Exchanged</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials (Statis - Bisa dibuat dinamis nanti jika ada tabel testimoni) -->
    <section class="py-3xl reveal">
        <div class="container mx-auto px-margin-desktop">
            <div class="text-center mb-2xl">
                <h2 class="font-headline-lg text-headline-lg mb-sm">Cerita Komunitas</h2>
                <p class="text-on-surface-variant">Apa kata mereka yang sudah merasakan manfaat Tukar Jasa.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <div class="bg-white p-xl rounded-[24px] border border-outline-variant shadow-sm relative card-interactive">
                    <span class="material-symbols-outlined text-primary-fixed-dim text-[48px] absolute top-4 right-4 opacity-30">format_quote</span>
                    <p class="text-body-md italic text-on-surface mb-xl relative z-10">"Platform ini sangat membantu saya sebagai freelance designer. Saya bisa menukarkan jasa desain saya dengan kursus marketing yang sangat saya butuhkan."</p>
                    <div class="flex items-center gap-md">
                        <img class="w-12 h-12 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuH1XagWjiVIXNilaLaCRcrBLnUoGy1QPXlK5jWkD35Xz3-Dbt5JSpRQzWlbUmCL7N_0_xmjzflXgXLqseNiqhvSRxdyqVmb8Wy2UDXY4uK35WA2xKj44jRyRHmtFyXbJqwOuEFpFGQCQy1ev_1Zb9q9Ep0EGbDbLAMBDlVvCiK8QcqSMUgIW0BMNL57PTCFiHS3UUwRNl2pWjsSg4IeuXPHX_ZpjohbUFeTYwNqyEl8tKSjc7KPNbFBMpEqmHpaZr2J35jAuVW51X"/>
                        <div><p class="font-bold text-body-sm">Maya Putri</p><p class="text-label-sm text-on-surface-variant">Graphic Designer</p></div>
                    </div>
                </div>
                <div class="bg-white p-xl rounded-[24px] border border-outline-variant shadow-sm relative card-interactive">
                    <span class="material-symbols-outlined text-primary-fixed-dim text-[48px] absolute top-4 right-4 opacity-30">format_quote</span>
                    <p class="text-body-md italic text-on-surface mb-xl relative z-10">"Sangat mudah digunakan! Sistem poinnya fair dan komunitasnya sangat profesional. Sudah melakukan lebih dari 10 kali tukar jasa di sini."</p>
                    <div class="flex items-center gap-md">
                        <img class="w-12 h-12 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAuri7buzVZSkVVsyUIC-pavLzW9FQ4eCSVpo4pT907LcavccNijAEXn0OsH6ZEA8pdN56xc8T4KtLCCeG1k3_jpvStQTnj1LfJXKhhZ2QNHCPsiYJ6uZBxO38jggu9dCp4n8IwYzpAs9JAY_w5FGYSYe-tRyWrCvK57Az89LKXrwV-zTlReiksKZxLo27mSTe_1anHt6dSlVyOfftcRIxFi-4RPpcrG65o3j9qiZsa6LD0unrs3O70tusxukfezlvilIhe20kC2zdt"/>
                        <div><p class="font-bold text-body-sm">Rian Pratama</p><p class="text-label-sm text-on-surface-variant">Web Developer</p></div>
                    </div>
                </div>
                <div class="bg-white p-xl rounded-[24px] border border-outline-variant shadow-sm relative card-interactive">
                    <span class="material-symbols-outlined text-primary-fixed-dim text-[48px] absolute top-4 right-4 opacity-30">format_quote</span>
                    <p class="text-body-md italic text-on-surface mb-xl relative z-10">"Tukar Jasa bukan sekadar platform transaksi, tapi juga tempat networking yang luar biasa dengan sesama profesional di bidang yang berbeda."</p>
                    <div class="flex items-center gap-md">
                        <img class="w-12 h-12 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_vKW0uETsnACYb4XpooLnPGdWEyBMJlK5ZZFdVoA6M_9WOxZN9P33gANlIuMymZs8w38gjMn7WGe9Vtf7t0Pj09RwM1phvbJPE0sECkeq23g-iWcgXNuTqNwISRBjPHefkqFmTp_WGxZBgpjkzPPNbcVMocnHdJbd3Elq1Uoxg7FSNhUq2FQdwArT0cCRFam3NNSjjWsQqXbpqSPE41qfUoo3zn9f94eiunoav84AdlSuNc4MzG2MdS_KLyuFtChjX8Sd8vKjsUTh"/>
                        <div><p class="font-bold text-body-sm">Dewi Lestari</p><p class="text-label-sm text-on-surface-variant">Content Writer</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-3xl reveal">
    <div class="container mx-auto px-margin-desktop">
        <div class="primary-gradient rounded-[40px] p-2xl text-center relative overflow-hidden transition-all duration-500 hover:shadow-2xl">
            <!-- Background Decoration -->
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-12 -right-12 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-display-lg text-display-lg text-white mb-lg">Ready to Exchange?</h2>
                <p class="text-on-primary-container text-body-lg mb-2xl">Mulai perjalananmu hari ini dan rasakan kemudahan bertukar keahlian tanpa batas biaya.</p>
                
                {{-- PERBAIKAN: Tombol Statis untuk Pengunjung Baru --}}
                <div class="flex flex-col sm:flex-row gap-md justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-primary px-3xl py-md rounded-xl font-bold text-body-md hover:shadow-xl transition-all scale-100 hover:scale-105 active:scale-95 shimmer">
                        Register Now
                    </a>
                    <a href="{{ route('login') }}" class="bg-primary-container text-white border border-on-primary-container px-3xl py-md rounded-xl font-bold text-body-md hover:bg-white hover:text-primary transition-all active:scale-95">
                        Login Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<!-- Footer -->
<footer class="w-full py-xl px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant reveal">
    <div class="md:col-span-1">
        <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-md">Tukar Jasa</h2>
        <p class="text-on-surface-variant text-body-sm mb-lg">Platform pertukaran keahlian terbesar di Indonesia untuk para profesional dan kreatif.</p>
        <div class="flex gap-md">
            <a class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:text-primary hover:scale-110 transition-all" href="#"><svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
            <a class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:text-primary hover:scale-110 transition-all" href="#"><svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path></svg></a>
            <a class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center text-on-surface-variant hover:text-primary hover:scale-110 transition-all" href="#"><svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg></a>
        </div>
    </div>
    <div>
        <h4 class="font-bold text-on-surface mb-lg">Platform</h4>
        <ul class="space-y-md">
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="{{ route('user.jasa.browse') }}">Explore Services</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#how-it-works">How it Works</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#categories">Categories</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Community Guidelines</a></li>
        </ul>
    </div>
    <div>
        <h4 class="font-bold text-on-surface mb-lg">Support</h4>
        <ul class="space-y-md">
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Help Center</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Safety Center</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Contact Us</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">FAQ</a></li>
        </ul>
    </div>
    <div>
        <h4 class="font-bold text-on-surface mb-lg">Legal</h4>
        <ul class="space-y-md">
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Privacy Policy</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Terms of Service</a></li>
            <li><a class="text-on-surface-variant hover:text-secondary transition-colors text-body-sm" href="#">Cookie Policy</a></li>
        </ul>
        <div class="mt-xl pt-lg border-t border-outline-variant">
            <p class="text-body-sm text-on-surface-variant">© {{ date('Y') }} Tukar Jasa Skill Exchange. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    const observerOptions = { root: null, threshold: 0.1, rootMargin: '0px' };
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('active'); });
    }, observerOptions);

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.reveal').forEach(reveal => revealObserver.observe(reveal));
        const hero = document.querySelector('section.reveal');
        if (hero) hero.classList.add('active');

        const nav = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('bg-white', 'shadow-md');
                nav.classList.remove('bg-surface/80');
            } else {
                nav.classList.remove('bg-white', 'shadow-md');
                nav.classList.add('bg-surface/80');
            }
        });
    });
</script>
</body>
</html>