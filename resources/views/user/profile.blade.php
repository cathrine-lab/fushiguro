<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => ($pengguna->nama ?? 'Profil') . ' | Tukar Jasa'])
    
    <style>
        /* Custom styles to match the reference design */
        .surface-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 6px -1px rgba(31, 16, 142, 0.05);
        }
        .hover-lift { transition: transform 0.3s ease-out; }
        .hover-lift:hover { transform: translateY(-4px); }
        
        /* Gradient for hero banner */
        .hero-gradient-bg {
            background: linear-gradient(135deg, #e2dfff 0%, #c3c0ff 100%);
        }
    </style>
</head>
<body class="font-body-md text-on-surface bg-background">
    
    {{-- Sidebar Tetap Menggunakan Partial Sistem --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content Canvas --}}
    <main class="md:ml-[280px] min-h-screen pt-16 pb-2xl">
        
        {{-- Header Global Sistem --}}
        @include('user.partials.header', ['title' => 'User Profile'])
        
        <div class="max-w-6xl mx-auto px-margin-mobile md:px-margin-desktop py-xl space-y-xl">
            
            {{-- Hero Profile Card (Design Reference) --}}
            <div class="surface-card rounded-2xl p-xl md:p-2xl relative overflow-hidden hover-lift">
                {{-- Abstract Background --}}
                <div class="absolute top-0 left-0 w-full h-32 hero-gradient-bg opacity-40 -z-10"></div>
                
                <div class="relative flex flex-col md:flex-row items-center md:items-end gap-xl mt-8 md:mt-12">
                    {{-- Avatar --}}
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-3xl border-4 border-white shadow-xl bg-primary-fixed flex items-center justify-center font-black text-primary text-5xl flex-shrink-0 group cursor-pointer">
                        {{ strtoupper(substr($pengguna->nama, 0, 1)) }}
                    </div>
                    
                    {{-- Info Text --}}
                    <div class="flex-grow text-center md:text-left pb-base">
                        <h1 class="font-display-lg text-display-lg text-primary mb-xs">{{ $pengguna->nama }}</h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
                            {{ $pengguna->bio ?? 'Pengguna aktif di platform Tukar Jasa. Tertarik bertukar keahlian dan membangun kolaborasi yang saling menguntungkan.' }}
                        </p>
                    </div>
                    
                    {{-- Action Button --}}
                    <div class="pb-base w-full md:w-auto">
                        @if(Auth::id() == $pengguna->id_pengguna)
                            <a href="{{ route('profile.edit') }}" 
                               class="primary-gradient px-xl py-md rounded-xl text-white font-label-md text-label-md flex items-center justify-center md:justify-start gap-sm hover:scale-[0.98] transition-all shadow-md w-full md:w-auto">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                                Edit Profil
                            </a>
                        @else
                            <a href="{{ route('user.jasa.browse') }}" 
                               class="bg-surface-container-high text-on-surface px-xl py-md rounded-xl font-label-md text-label-md flex items-center justify-center md:justify-start gap-sm hover:bg-surface-container-low transition-all w-full md:w-auto">
                                <span class="material-symbols-outlined text-[20px]">swap_horiz</span>
                                Lihat Jasa
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Stats Grid (Bento Style) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                {{-- Services Completed --}}
                <div class="surface-card rounded-2xl p-lg flex items-center gap-lg hover-lift">
                    <div class="h-14 w-14 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[32px]">task_alt</span>
                    </div>
                    <div>
                        <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Jasa Selesai</p>
                        <p class="font-headline-lg text-headline-lg text-primary">{{ $transaksiSelesai }}</p>
                    </div>
                </div>
                
                {{-- Average Rating --}}
                <div class="surface-card rounded-2xl p-lg flex items-center gap-lg hover-lift">
                    <div class="h-14 w-14 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">star</span>
                    </div>
                    <div>
                        <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Rating Rata-rata</p>
                        <p class="font-headline-lg text-headline-lg text-primary">
                            {{ $avgRating ? number_format($avgRating, 1) : '-' }}
                            @if($avgRating)<span class="text-body-md text-on-surface-variant font-normal">/5</span>@endif
                        </p>
                    </div>
                </div>
                
                {{-- Total Reviews --}}
                <div class="surface-card rounded-2xl p-lg flex items-center gap-lg hover-lift">
                    <div class="h-14 w-14 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined text-[32px]">groups</span>
                    </div>
                    <div>
                        <p class="text-label-sm font-label-sm text-on-surface-variant uppercase tracking-wider">Total Ulasan</p>
                        <p class="font-headline-lg text-headline-lg text-primary">{{ $totalUlasan }}</p>
                    </div>
                </div>
            </div>

            {{-- Main Info Split --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
                
                {{-- Left Column: Details --}}
                <div class="lg:col-span-4 space-y-lg">
                    <div class="surface-card rounded-2xl p-xl hover-lift">
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
                                    <span class="font-body-md text-body-md">{{ \Carbon\Carbon::parse($pengguna->created_at)->format('F Y') }}</span>
                                </div>
                            </div>
                            
                            <div>
                                <p class="text-label-sm font-label-sm text-on-surface-variant mb-xs">KONTAK</p>
                                <div class="space-y-sm">
                                    <div class="flex items-center gap-sm text-on-surface">
                                        <span class="material-symbols-outlined text-primary">mail</span>
                                        <span class="font-body-md text-body-md break-all">{{ $pengguna->email }}</span>
                                    </div>
                                    @if($pengguna->no_hp)
                                    <div class="flex items-center gap-sm text-on-surface">
                                        <span class="material-symbols-outlined text-primary">phone</span>
                                        <span class="font-body-md text-body-md">{{ $pengguna->no_hp }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Services and Activity --}}
                <div class="lg:col-span-8 space-y-lg">
                    
                    {{-- Jasa Ditawarkan (Replaces Skills from Reference) --}}
                    <div class="surface-card rounded-2xl p-xl hover-lift">
                        <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined">design_services</span>
                            Jasa Ditawarkan
                            <span class="ml-auto text-label-sm text-on-surface-variant font-normal">({{ $pengguna->jasa->count() }})</span>
                        </h2>
                        
                        @if($pengguna->jasa->isEmpty())
                            <p class="text-body-sm text-on-surface-variant italic">Belum ada jasa yang ditawarkan.</p>
                        @else
                            <div class="flex flex-wrap gap-md">
                                @foreach($pengguna->jasa as $jasa)
                                    <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}" 
                                       class="bg-primary-fixed text-on-primary-fixed px-lg py-sm rounded-full font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-colors flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
                                        {{ $jasa->nama_jasa }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Recent Exchanges / Ulasan Terbaru --}}
                    <div class="surface-card rounded-2xl p-xl hover-lift">
                        <div class="flex justify-between items-center mb-lg">
                            <h2 class="font-headline-sm text-headline-sm text-primary flex items-center gap-sm">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                                Ulasan Terbaru
                            </h2>
                            @if($ulasanTerbaru->isNotEmpty())
                                <span class="text-label-sm text-on-surface-variant">Dari {{ $totalUlasan }} ulasan</span>
                            @endif
                        </div>
                        
                        @php
                            // Mengambil ulasan terbaru dari controller
                            $ulasanList = $ulasanTerbaru ?? collect();
                        @endphp

                        @if($ulasanList->isEmpty())
                            <div class="py-lg text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-4xl mb-2 opacity-40">rate_review</span>
                                <p>Belum ada ulasan untuk pengguna ini.</p>
                            </div>
                        @else
                            <div class="divide-y divide-outline-variant">
                                @foreach($ulasanList as $ulasan)
                                    <div class="py-lg first:pt-0 last:pb-0 last:border-0">
                                        <div class="flex items-start justify-between mb-2">
                                            <div class="flex items-center gap-md">
                                                <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-primary flex-shrink-0">
                                                    {{ strtoupper(substr($ulasan->pengguna->nama, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <p class="font-label-md text-on-surface">{{ $ulasan->pengguna->nama }}</p>
                                                    <p class="text-label-sm text-on-surface-variant">
                                                        {{ $ulasan->transaksi->jasa->nama_jasa ?? 'Transaksi' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-1 text-yellow-500">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <span class="material-symbols-outlined text-[18px]"
                                                          style="font-variation-settings:'FILL' {{ $i <= $ulasan->rating ? 1 : 0 }}">star</span>
                                                @endfor
                                            </div>
                                        </div>
                                        @if($ulasan->komentar)
                                            <p class="font-body-sm text-on-surface-variant ml-[52px] line-clamp-2">
                                                "{{ $ulasan->komentar }}"
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>
</html>