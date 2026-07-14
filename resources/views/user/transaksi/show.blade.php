<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Detail Transaksi | Tukar Jasa'])
    
    <style>
        .surface-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 6px -1px rgba(31, 16, 142, 0.05);
        }
        .info-row {
            @apply flex items-start justify-between py-3 border-b border-outline-variant/50 last:border-0;
        }
        .info-label {
            @apply font-label-sm text-on-surface-variant pt-0.5;
        }
        .info-value {
            @apply font-body-md text-on-surface text-right;
        }
    </style>
</head>
<body class="font-body-md text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar User --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content --}}
    <main class="md:ml-[280px] min-h-screen pt-16 pb-3xl flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Detail Transaksi'])
        
        <div class="max-w-5xl mx-auto px-margin-mobile md:px-margin-desktop mt-xl">
            
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-lg">
                <a href="{{ route('user.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a href="{{ route('user.transaksi.index') }}" class="hover:text-primary transition-colors">Transaksi Saya</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary font-bold">Detail Transaksi</span>
            </nav>

            @php
                $badge = match($transaksi->status) {
                    'pending'    => ['bg-amber-100 text-amber-700', 'Menunggu Konfirmasi'],
                    'proses'     => ['bg-blue-100 text-blue-700',     'Sedang Dikerjakan'],
                    'selesai'    => ['bg-emerald-100 text-emerald-700','Selesai'],
                    'dibatalkan' => ['bg-red-100 text-red-700',       'Dibatalkan'],
                };
                
                $isPenyedia = (int)$transaksi->id_penyedia_jasa === (int)Auth::id();
                $isPenerima = (int)$transaksi->id_penerima_jasa === (int)Auth::id();
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
                
                {{-- Left Column: Transaction Details --}}
                <div class="lg:col-span-8 space-y-lg">
                    
                    {{-- Service Info Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <div class="flex items-center justify-between mb-lg">
                            <h2 class="font-headline-sm text-headline-sm text-primary flex items-center gap-sm">
                                <span class="material-symbols-outlined text-[24px]">receipt_long</span>
                                Informasi Transaksi
                            </h2>
                            <span class="px-3 py-1 rounded-full text-label-sm font-bold {{ $badge[0] }}">
                                {{ $badge[1] }}
                            </span>
                        </div>

                        {{-- Provider Profile Section --}}
                        <div class="flex items-center gap-md p-md bg-primary-fixed/30 rounded-xl mb-md">
                            <a href="{{ route('user.profil.show', $transaksi->penyedia->id_pengguna) }}" 
                               class="w-14 h-14 rounded-full bg-primary flex items-center justify-center text-white font-bold text-xl flex-shrink-0 hover:ring-2 hover:ring-primary/30 transition">
                                {{ strtoupper(substr($transaksi->penyedia->nama, 0, 1)) }}
                            </a>
                            <div class="flex-1 min-w-0">
                                <p class="font-label-sm text-on-surface-variant">Penyedia Jasa</p>
                                <a href="{{ route('user.profil.show', $transaksi->penyedia->id_pengguna) }}" 
                                   class="font-headline-sm text-on-surface hover:text-primary transition-colors truncate block">
                                    {{ $transaksi->penyedia->nama }}
                                </a>
                            </div>
                        </div>

                        {{-- Receiver Profile Section (BARU!) --}}
                        <div class="flex items-center gap-md p-md bg-secondary-fixed/30 rounded-xl mb-lg">
                            <a href="{{ route('user.profil.show', $transaksi->penerima->id_pengguna) }}" 
                               class="w-14 h-14 rounded-full bg-secondary flex items-center justify-center text-white font-bold text-xl flex-shrink-0 hover:ring-2 hover:ring-secondary/30 transition">
                                {{ strtoupper(substr($transaksi->penerima->nama, 0, 1)) }}
                            </a>
                            <div class="flex-1 min-w-0">
                                <p class="font-label-sm text-on-surface-variant">Penerima Jasa</p>
                                <a href="{{ route('user.profil.show', $transaksi->penerima->id_pengguna) }}" 
                                   class="font-headline-sm text-on-surface hover:text-secondary transition-colors truncate block">
                                    {{ $transaksi->penerima->nama }}
                                </a>
                            </div>
                        </div>

                        {{-- Details List --}}
                        <div class="space-y-0">
                            <div class="info-row">
                                <span class="info-label">Nama Jasa</span>
                                <span class="info-value font-medium">{{ $transaksi->jasa->nama_jasa }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Kategori</span>
                                <span class="info-value">{{ $transaksi->jasa->kategori->nama_kategori }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Jumlah Poin</span>
                                <span class="info-value font-bold text-primary text-lg">{{ number_format($transaksi->jumlah_poin) }} pts</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tanggal Transaksi</span>
                                <span class="info-value">{{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->format('d M Y, H:i') }}</span>
                            </div>
                            @if($transaksi->status === 'selesai' && $transaksi->tgl_selesai)
                            <div class="info-row">
                                <span class="info-label">Tanggal Selesai</span>
                                <span class="info-value">{{ \Carbon\Carbon::parse($transaksi->tgl_selesai)->format('d M Y, H:i') }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($transaksi->status === 'selesai' && $isPenerima && !$transaksi->ulasan)
                        <div class="surface-card rounded-2xl p-xl md:p-2xl border-l-4 border-l-primary">
                            <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                                <span class="material-symbols-outlined text-[24px]">rate_review</span>
                                Beri Penilaian
                            </h2>
                            
                            <p class="font-body-sm text-on-surface-variant mb-xl">
                                Bagaimana pengalamanmu dengan <strong>{{ $transaksi->penyedia->nama }}</strong>? 
                                Ulasanmu membantu komunitas tumbuh!
                            </p>

                            <form method="POST" action="{{ route('user.ulasan.store', $transaksi->id_transaksi) }}" class="space-y-xl" id="reviewForm">
                                @csrf
                                {{-- Star Rating --}}
                                <div>
                                    <label class="block font-label-md text-on-surface mb-3">Rating Kamu</label>
                                    <div class="flex gap-2" id="starContainer">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button type="button" 
                                                class="star-btn material-symbols-outlined text-[40px] text-outline-variant hover:text-yellow-400 transition-all duration-200"
                                                data-value="{{ $i }}"
                                                style="font-variation-settings: 'FILL' 0;">
                                                star
                                            </button>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="ratingInput" required />
                                    <p id="ratingText" class="mt-3 font-label-sm text-on-surface-variant italic">Klik bintang untuk memberi nilai</p>
                                </div>

                                {{-- Komentar --}}
                                <div>
                                    <label for="komentar" class="block font-label-md text-on-surface mb-2">Ulasan (Opsional)</label>
                                    <textarea id="komentar" name="komentar" rows="4" 
                                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-xl 
                                               text-on-surface font-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20 
                                               focus:border-primary resize-none placeholder:text-on-surface-variant/50"
                                        placeholder="Ceritakan apa yang kamu suka atau kurang dari layanan ini..."></textarea>
                                </div>

                                <button type="submit" 
                                    class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[20px]">send</span>
                                    Kirim Ulasan
                                </button>
                            </form>
                        </div>
                    @endif

                    {{-- Existing Review Display --}}
                    @if($transaksi->ulasan)
                        <div class="surface-card rounded-2xl p-xl md:p-2xl">
                            <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                                <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                Ulasan Diberikan
                            </h2>
                            
                            <div class="flex items-center gap-1 text-yellow-500 mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="material-symbols-outlined text-[24px]"
                                          style="font-variation-settings:'FILL' {{ $i <= $transaksi->ulasan->rating ? 1 : 0 }}">star</span>
                                @endfor
                                <span class="ml-2 font-label-md text-on-surface">{{ $transaksi->ulasan->rating }}/5</span>
                            </div>
                            
                            @if($transaksi->ulasan->komentar)
                                <div class="bg-surface-container-low rounded-xl p-md">
                                    <p class="font-body-md text-on-surface leading-relaxed">"{{ $transaksi->ulasan->komentar }}"</p>
                                </div>
                            @endif
                            
                            <p class="mt-4 font-label-sm text-on-surface-variant">
                                Diulas pada {{ \Carbon\Carbon::parse($transaksi->ulasan->created_at)->format('d M Y') }}
                            </p>
                        </div>
                    @endif

                </div>

                {{-- Right Column: Actions & Timeline --}}
                <div class="lg:col-span-4 space-y-lg">
                    
                    {{-- Action Buttons Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg">Aksi Transaksi</h3>
                        
                        @if($transaksi->status === 'pending')
                            @if($isPenyedia)
                                <div class="space-y-md">
                                    <form action="{{ route('user.transaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="proses">
                                        <button type="submit" onclick="return confirm('Terima request ini? Poin penerima akan di-hold.')"
                                                class="w-full primary-gradient text-white py-3 rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center justify-center gap-2">
                                            <span class="material-symbols-outlined text-[20px]">check_circle</span>
                                            Terima & Kerjakan
                                        </button>
                                    </form>
                                    <form action="{{ route('user.transaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="dibatalkan">
                                        <button type="submit" onclick="return confirm('Yakin ingin menolak request ini?')"
                                                class="w-full border border-error text-error py-3 rounded-xl font-label-md hover:bg-error/5 transition-all flex items-center justify-center gap-2">
                                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                                            Tolak Request
                                        </button>
                                    </form>
                                </div>
                            @elseif($isPenerima)
                                <form action="{{ route('user.transaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="dibatalkan">
                                    <button type="submit" onclick="return confirm('Batalkan request ini?')"
                                            class="w-full border border-error text-error py-3 rounded-xl font-label-md hover:bg-error/5 transition-all flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-[20px]">cancel</span>
                                        Batalkan Request
                                    </button>
                                </form>
                            @endif

                        @elseif($transaksi->status === 'proses' && $isPenyedia)
                            <form action="{{ route('user.transaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="selesai">
                                <button type="submit" onclick="return confirm('Tandai selesai? Poin akan langsung ditransfer ke akunmu.')"
                                        class="w-full primary-gradient text-white py-3 rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined text-[20px]">task_alt</span>
                                    Tandai Selesai
                                </button>
                            </form>
                            <p class="mt-3 font-label-sm text-on-surface-variant text-center">
                                Poin akan ditransfer ke penyedia setelah ditandai selesai.
                            </p>

                        @elseif($transaksi->status === 'selesai')
                            <div class="text-center py-lg">
                                <span class="material-symbols-outlined text-[48px] text-emerald-500 mb-2">check_circle</span>
                                <p class="font-headline-sm text-on-surface">Transaksi Selesai</p>
                                <p class="font-body-sm text-on-surface-variant mt-1">
                                    @if($isPenerima && !$transaksi->ulasan)
                                        Jangan lupa beri ulasan ya!
                                    @else
                                        Terima kasih telah bertransaksi.
                                    @endif
                                </p>
                            </div>

                        @elseif($transaksi->status === 'dibatalkan')
                            <div class="text-center py-lg">
                                <span class="material-symbols-outlined text-[48px] text-red-500 mb-2">cancel</span>
                                <p class="font-headline-sm text-on-surface">Transaksi Dibatalkan</p>
                                <p class="font-body-sm text-on-surface-variant mt-1">
                                    Transaksi ini telah dibatalkan oleh salah satu pihak.
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- Status Timeline --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-lg">Progres Transaksi</h3>
                        
                        <div class="relative pl-6 space-y-lg before:content-[''] before:absolute before:left-[11px] before:top-2 before:bottom-2 before:w-[2px] before:bg-outline-variant">
                            
                            {{-- Step 1: Pending --}}
                            <div class="relative">
                                <div class="absolute -left-[29px] w-6 h-6 rounded-full flex items-center justify-center z-10 border-4 border-surface-container-lowest
                                    {{ $transaksi->status !== 'dibatalkan' ? 'bg-primary text-white' : 'bg-outline-variant text-white' }}">
                                    <span class="material-symbols-outlined text-[14px]">pending</span>
                                </div>
                                <p class="font-label-md text-on-surface">Request Dibuat</p>
                                <p class="font-label-sm text-on-surface-variant">{{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->format('d M Y') }}</p>
                            </div>

                            {{-- Step 2: Proses --}}
                            <div class="relative">
                                <div class="absolute -left-[29px] w-6 h-6 rounded-full flex items-center justify-center z-10 border-4 border-surface-container-lowest
                                    {{ in_array($transaksi->status, ['proses', 'selesai']) ? 'bg-primary text-white' : 'bg-outline-variant text-white' }}">
                                    <span class="material-symbols-outlined text-[14px]">construction</span>
                                </div>
                                <p class="font-label-md {{ in_array($transaksi->status, ['proses', 'selesai']) ? 'text-on-surface' : 'text-on-surface-variant' }}">
                                    Sedang Dikerjakan
                                </p>
                                @if(in_array($transaksi->status, ['proses', 'selesai']))
                                    <p class="font-label-sm text-on-surface-variant">
                                        {{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d M Y') }}
                                    </p>
                                @endif
                            </div>

                            {{-- Step 3: Selesai --}}
                            <div class="relative">
                                <div class="absolute -left-[29px] w-6 h-6 rounded-full flex items-center justify-center z-10 border-4 border-surface-container-lowest
                                    {{ $transaksi->status === 'selesai' ? 'bg-emerald-500 text-white' : 'bg-outline-variant text-white' }}">
                                    <span class="material-symbols-outlined text-[14px]">check</span>
                                </div>
                                <p class="font-label-md {{ $transaksi->status === 'selesai' ? 'text-on-surface' : 'text-on-surface-variant' }}">
                                    Selesai
                                </p>
                                @if($transaksi->status === 'selesai')
                                    <p class="font-label-sm text-on-surface-variant">
                                        {{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d M Y') }}
                                    </p>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')

    {{-- SweetAlert Notification --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('notif_title'))
        Swal.fire({
            title: "{{ session('notif_title') }}",
            text: "{{ session('notif_text') }}",
            icon: "{{ session('notif_icon') }}",
            confirmButtonText: 'OK'
        });
        @endif

        // Star Rating Interactive Script
        const stars = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('ratingInput');
        const ratingText = document.getElementById('ratingText');
        let currentRating = 0;

        const labels = ['', 'Sangat Buruk', 'Buruk', 'Cukup', 'Bagus', 'Luar Biasa'];

        if (stars.length > 0) {
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    currentRating = parseInt(this.dataset.value);
                    ratingInput.value = currentRating;
                    ratingText.textContent = labels[currentRating];
                    ratingText.classList.remove('text-on-surface-variant', 'italic');
                    ratingText.classList.add('text-primary', 'font-bold');
                    updateStars(currentRating);
                });

                star.addEventListener('mouseenter', function() {
                    highlightStars(parseInt(this.dataset.value));
                });
            });

            document.getElementById('starContainer').addEventListener('mouseleave', () => {
                updateStars(currentRating);
            });
        }

        function updateStars(rating) {
            stars.forEach(s => {
                const val = parseInt(s.dataset.value);
                s.style.color = val <= rating ? '#fbbf24' : '';
                s.style.fontVariationSettings = val <= rating ? "'FILL' 1" : "'FILL' 0";
            });
        }

        function highlightStars(rating) {
            stars.forEach(s => {
                const val = parseInt(s.dataset.value);
                s.style.color = val <= rating ? '#fbbf24' : '';
                s.style.fontVariationSettings = val <= rating ? "'FILL' 1" : "'FILL' 0";
            });
        }
    </script>
</body>
</html>