<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Profil {{ $pengguna->nama }} | Tukar Jasa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-surface":"#2d3133","on-secondary":"#ffffff","on-tertiary-container":"#78b2ff",
                        "inverse-on-surface":"#eff1f3","error-container":"#ffdad6","tertiary-fixed":"#d4e3ff",
                        "surface-container-low":"#f2f4f6","on-primary":"#ffffff","tertiary-container":"#00447d",
                        "inverse-primary":"#c3c0ff","surface-container-highest":"#e0e3e5","on-tertiary":"#ffffff",
                        "on-secondary-fixed-variant":"#5a00c6","on-secondary-container":"#fffbff","on-primary-fixed":"#0f0069",
                        "background":"#f7f9fb","on-error":"#ffffff","on-secondary-fixed":"#25005a",
                        "secondary-fixed-dim":"#d2bbff","surface-tint":"#544fc0","secondary-container":"#8a4cfc",
                        "outline-variant":"#c8c4d5","secondary":"#712ae2","outline":"#777584",
                        "surface-container-high":"#e6e8ea","on-primary-fixed-variant":"#3b35a7",
                        "surface-variant":"#e0e3e5","secondary-fixed":"#eaddff","on-surface-variant":"#464553",
                        "primary-container":"#3730a3","tertiary-fixed-dim":"#a4c9ff","surface-dim":"#d8dadc",
                        "on-tertiary-fixed-variant":"#004883","primary-fixed-dim":"#c3c0ff","tertiary":"#002d57",
                        "surface-bright":"#f7f9fb","on-surface":"#191c1e","on-primary-container":"#a9a7ff",
                        "primary":"#1f108e","error":"#ba1a1a","primary-fixed":"#e2dfff","on-background":"#191c1e",
                        "surface":"#f7f9fb","surface-container-lowest":"#ffffff","on-error-container":"#93000a",
                        "surface-container":"#eceef0","on-tertiary-fixed":"#001c39"
                    },
                    "borderRadius": {"DEFAULT":"0.25rem","lg":"0.5rem","xl":"0.75rem","full":"9999px"},
                    "spacing": {
                        "sm":"8px","xl":"32px","2xl":"48px","margin-desktop":"40px","margin-mobile":"16px",
                        "base":"4px","md":"16px","lg":"24px","gutter":"24px","3xl":"64px","xs":"4px"
                    },
                    "fontFamily": {
                        "body-lg":["Inter"],"headline-sm":["Inter"],"label-md":["Inter"],"body-md":["Inter"],
                        "headline-md":["Inter"],"headline-lg":["Inter"],"body-sm":["Inter"],"display-lg":["Inter"],"label-sm":["Inter"]
                    },
                    "fontSize": {
                        "body-lg":["18px",{"lineHeight":"1.6","fontWeight":"400"}],
                        "headline-sm":["20px",{"lineHeight":"1.4","fontWeight":"600"}],
                        "label-md":["14px",{"lineHeight":"1","letterSpacing":"0.01em","fontWeight":"600"}],
                        "body-md":["16px",{"lineHeight":"1.6","fontWeight":"400"}],
                        "headline-md":["24px",{"lineHeight":"1.3","fontWeight":"600"}],
                        "headline-lg":["32px",{"lineHeight":"1.25","letterSpacing":"-0.01em","fontWeight":"600"}],
                        "body-sm":["14px",{"lineHeight":"1.5","fontWeight":"400"}],
                        "display-lg":["48px",{"lineHeight":"1.2","letterSpacing":"-0.02em","fontWeight":"700"}],
                        "label-sm":["12px",{"lineHeight":"1","letterSpacing":"0.02em","fontWeight":"500"}]
                    }
                }
            }
        }
    </script>
    <style>
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
        .surface-card { background: #ffffff; border: 1px solid #E2E8F0; box-shadow: 0 4px 6px -1px rgba(31,16,142,.05); }
        .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; vertical-align: middle; }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md">

{{-- Sidebar --}}
@include('user.partials.sidebar')

{{-- Main --}}
<main class="md:ml-[280px] min-h-screen pb-2xl">
    <div class="max-w-5xl mx-auto px-margin-mobile md:px-margin-desktop py-xl">

        {{-- Header Card --}}
        <div class="surface-card rounded-2xl p-xl mb-lg overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-32 bg-primary-fixed/30 -z-10"></div>
            <div class="flex flex-col md:flex-row items-center md:items-end gap-xl mt-12">

                {{-- Avatar --}}
                <div class="h-40 w-40 rounded-3xl border-4 border-white shadow-xl overflow-hidden primary-gradient flex items-center justify-center text-white font-black text-6xl flex-shrink-0">
                    {{ strtoupper(substr($pengguna->nama, 0, 1)) }}
                </div>

                <div class="flex-grow text-center md:text-left pb-base">
                    <h1 class="font-display-lg text-display-lg text-primary mb-xs">{{ $pengguna->nama }}</h1>
                    @if($pengguna->alamat)
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">{{ $pengguna->alamat }}</p>
                    @else
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl italic">Belum ada deskripsi</p>
                    @endif
                </div>

                <div class="pb-base">
                    @if(Auth::id() === $pengguna->id_pengguna)
                        {{-- Profil sendiri: tampilkan tombol edit --}}
                        <a href="{{ route('profile.edit') }}"
                           class="primary-gradient px-xl py-md rounded-xl text-white font-label-md text-label-md flex items-center gap-sm hover:opacity-90 transition shadow-md">
                            <span class="material-symbols-outlined text-[20px]">edit</span>
                            Edit Profile
                        </a>
                    @else
                        {{-- Profil orang lain: tampilkan tombol lihat jasa --}}
                        @if($pengguna->jasa->isNotEmpty())
                            <a href="{{ route('user.jasa.browse') }}"
                               class="primary-gradient px-xl py-md rounded-xl text-white font-label-md text-label-md flex items-center gap-sm hover:opacity-90 transition shadow-md">
                                <span class="material-symbols-outlined text-[20px]">swap_horiz</span>
                                Request Jasa
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg mb-lg">
            <div class="surface-card rounded-2xl p-lg flex items-center gap-lg">
                <div class="h-14 w-14 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[32px]">task_alt</span>
                </div>
                <div>
                    <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Transaksi Selesai</p>
                    <p class="font-headline-lg text-headline-lg text-primary">{{ $transaksiSelesai }}</p>
                </div>
            </div>
            <div class="surface-card rounded-2xl p-lg flex items-center gap-lg">
                <div class="h-14 w-14 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-[32px]">star</span>
                </div>
                <div>
                    <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Rata-rata Rating</p>
                    <p class="font-headline-lg text-headline-lg text-primary">
                        {{ $avgRating ? number_format($avgRating, 1) : '-' }}
                        <span class="text-body-md text-on-surface-variant font-normal">/5</span>
                    </p>
                </div>
            </div>
            <div class="surface-card rounded-2xl p-lg flex items-center gap-lg">
                <div class="h-14 w-14 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary">
                    <span class="material-symbols-outlined text-[32px]">toll</span>
                </div>
                <div>
                    <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Poin</p>
                    <p class="font-headline-lg text-headline-lg text-primary">{{ number_format($pengguna->poin) }}</p>
                </div>
            </div>
        </div>

        {{-- Main Info Split --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">

            {{-- Kiri: Info --}}
            <div class="lg:col-span-4 space-y-lg">
                <div class="surface-card rounded-2xl p-xl">
                    <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                        <span class="material-symbols-outlined">person_pin</span>
                        Informasi
                    </h2>
                    <div class="space-y-xl">
                        @if($pengguna->alamat)
                            <div>
                                <p class="text-label-sm font-label-sm text-on-surface-variant mb-xs">LOKASI</p>
                                <div class="flex items-center gap-sm text-on-surface">
                                    <span class="material-symbols-outlined text-primary">location_on</span>
                                    <span class="font-body-md text-body-md">{{ $pengguna->alamat }}</span>
                                </div>
                            </div>
                        @endif

                        <div>
                            <p class="text-label-sm font-label-sm text-on-surface-variant mb-xs">BERGABUNG SEJAK</p>
                            <div class="flex items-center gap-sm text-on-surface">
                                <span class="material-symbols-outlined text-primary">calendar_today</span>
                                <span class="font-body-md text-body-md">{{ $pengguna->created_at->format('F Y') }}</span>
                            </div>
                        </div>

                        <div>
                            <p class="text-label-sm font-label-sm text-on-surface-variant mb-xs">KONTAK</p>
                            <div class="flex items-center gap-sm text-on-surface">
                                <span class="material-symbols-outlined text-primary">mail</span>
                                <span class="font-body-md text-body-md">{{ $pengguna->email }}</span>
                            </div>
                            @if($pengguna->no_hp)
                                <div class="flex items-center gap-sm text-on-surface mt-sm">
                                    <span class="material-symbols-outlined text-primary">phone</span>
                                    <span class="font-body-md text-body-md">{{ $pengguna->no_hp }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Kategori Jasa --}}
                @if($pengguna->jasa->isNotEmpty())
                    <div class="surface-card rounded-2xl p-xl">
                        <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined">psychology</span>
                            Kategori Keahlian
                        </h2>
                        <div class="flex flex-wrap gap-md">
                            @foreach($pengguna->jasa->pluck('kategori.nama_kategori')->unique() as $kat)
                                <span class="bg-primary-fixed text-on-primary-fixed px-lg py-sm rounded-full font-label-md text-label-md">
                                    {{ $kat }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Kanan: Jasa & Ulasan --}}
            <div class="lg:col-span-8 space-y-lg">

                {{-- Jasa --}}
                <div class="surface-card rounded-2xl p-xl">
                    <div class="flex justify-between items-center mb-lg">
                        <h2 class="font-headline-sm text-headline-sm text-primary flex items-center gap-sm">
                            <span class="material-symbols-outlined">design_services</span>
                            Jasa yang Ditawarkan
                        </h2>
                        <span class="text-label-sm text-on-surface-variant">{{ $pengguna->jasa->count() }} jasa</span>
                    </div>

                    @if($pengguna->jasa->isEmpty())
                        <div class="text-center py-xl text-on-surface-variant">
                            <span class="material-symbols-outlined text-[48px]">design_services</span>
                            <p class="font-body-sm text-body-sm mt-sm">Belum ada jasa yang diposting</p>
                        </div>
                    @else
                        <div class="divide-y divide-outline-variant">
                            @foreach($pengguna->jasa as $jasa)
                                <div class="py-lg flex items-start justify-between gap-md">
                                    <div class="flex gap-lg">
                                        <div class="h-12 w-12 rounded-xl bg-surface-container-low flex items-center justify-center text-primary flex-shrink-0">
                                            <span class="material-symbols-outlined">design_services</span>
                                        </div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">{{ $jasa->nama_jasa }}</p>
                                            <p class="text-body-sm text-on-surface-variant">{{ $jasa->kategori->nama_kategori }}</p>
                                            <p class="text-body-sm text-on-surface-variant mt-xs line-clamp-2">{{ $jasa->deskripsi }}</p>
                                        </div>
                                    </div>
                                    @if(Auth::id() !== $pengguna->id_pengguna)
                                        <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}"
                                           class="flex-shrink-0 text-primary font-label-md text-label-md hover:underline flex items-center gap-xs">
                                            Request
                                            <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Ulasan --}}
                <div class="surface-card rounded-2xl p-xl">
                    <div class="flex justify-between items-center mb-lg">
                        <h2 class="font-headline-sm text-headline-sm text-primary flex items-center gap-sm">
                            <span class="material-symbols-outlined">star</span>
                            Ulasan Diterima
                        </h2>
                        <span class="text-label-sm text-on-surface-variant">{{ $totalUlasan }} ulasan</span>
                    </div>

                    @if($ulasanTerbaru->isEmpty())
                        <div class="text-center py-xl text-on-surface-variant">
                            <span class="material-symbols-outlined text-[48px]">star_border</span>
                            <p class="font-body-sm text-body-sm mt-sm">Belum ada ulasan</p>
                        </div>
                    @else
                        <div class="divide-y divide-outline-variant">
                            @foreach($ulasanTerbaru as $ulasan)
                                <div class="py-lg flex items-start justify-between gap-md">
                                    <div class="flex gap-lg">
                                        <div class="h-10 w-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold flex-shrink-0">
                                            {{ strtoupper(substr($ulasan->pengguna->nama, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-label-md text-label-md text-on-surface">{{ $ulasan->pengguna->nama }}</p>
                                            <p class="text-body-sm text-on-surface-variant">{{ $ulasan->transaksi->jasa->nama_jasa }}</p>
                                            @if($ulasan->komentar)
                                                <p class="text-body-sm text-on-surface mt-xs">{{ $ulasan->komentar }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right flex-shrink-0">
                                        <div class="flex items-center gap-xs text-yellow-400 justify-end">
                                            @for($i = 1; $i <= 5; $i++)
                                                <span class="material-symbols-outlined text-[16px]"
                                                      style="font-variation-settings:'FILL' {{ $i <= $ulasan->rating ? 1 : 0 }}">star</span>
                                            @endfor
                                        </div>
                                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase mt-xs">
                                            {{ $ulasan->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</main>

{{-- Footer --}}
<footer class="md:ml-[280px] w-full py-xl px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter bg-surface-container-lowest border-t border-outline-variant">
    <div class="md:col-span-2">
        <span class="font-headline-md text-headline-md font-bold text-on-surface">Tukar Jasa</span>
        <p class="mt-md font-body-sm text-body-sm text-on-surface-variant max-w-sm">
            Empowering professionals to trade skills and build a collaborative future.
        </p>
        <p class="mt-xl font-body-sm text-body-sm text-on-surface-variant">© 2024 Tukar Jasa Skill Exchange. All rights reserved.</p>
    </div>
    <div>
        <h4 class="font-label-md text-label-md text-primary mb-md">Company</h4>
        <ul class="space-y-sm">
            <li><a class="text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Privacy Policy</a></li>
            <li><a class="text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Terms of Service</a></li>
        </ul>
    </div>
    <div>
        <h4 class="font-label-md text-label-md text-primary mb-md">Support</h4>
        <ul class="space-y-sm">
            <li><a class="text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Community Guidelines</a></li>
            <li><a class="text-body-sm text-on-surface-variant hover:text-secondary transition-colors" href="#">Help Center</a></li>
        </ul>
    </div>
</footer>

{{-- Mobile Bottom Nav --}}
<div class="md:hidden fixed bottom-0 left-0 w-full bg-surface border-t border-outline-variant px-md py-sm flex justify-around items-center z-50">
    <a href="{{ route('user.dashboard') }}" class="flex flex-col items-center gap-xs text-on-surface-variant">
        <span class="material-symbols-outlined">dashboard</span>
        <span class="text-[10px] font-bold">Dash</span>
    </a>
    <a href="{{ route('user.transaksi.index') }}" class="flex flex-col items-center gap-xs text-on-surface-variant">
        <span class="material-symbols-outlined">swap_horiz</span>
        <span class="text-[10px] font-bold">Transaksi</span>
    </a>
    <a href="{{ route('user.profil.show', Auth::id()) }}" class="flex flex-col items-center gap-xs text-primary">
        <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">person</span>
        <span class="text-[10px] font-bold">Profil</span>
    </a>
    <a href="{{ route('user.jasa.browse') }}" class="flex flex-col items-center gap-xs text-on-surface-variant">
        <span class="material-symbols-outlined">search</span>
        <span class="text-[10px] font-bold">Browse</span>
    </a>
</div>

<script>
    document.querySelectorAll('.surface-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-4px)';
            card.style.transition = 'all 0.3s ease-out';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
</script>

</body>
</html>