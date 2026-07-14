<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Beri Ulasan | Tukar Jasa'])
    
    <style>
        .surface-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 6px -1px rgba(31, 16, 142, 0.05);
        }
        .form-input {
            @apply w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-xl 
                   text-on-surface font-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20 
                   focus:border-primary transition-all placeholder:text-on-surface-variant/50 resize-none;
        }
    </style>
</head>
<body class="font-body-md text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar User --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content --}}
    <main class="md:ml-[280px] min-h-screen pt-16 pb-3xl flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Beri Ulasan'])
        
        <div class="max-w-3xl mx-auto px-margin-mobile md:px-margin-desktop mt-xl">
            
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-lg">
                <a href="{{ route('user.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a href="{{ route('user.transaksi.index') }}" class="hover:text-primary transition-colors">Transaksi Saya</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a href="{{ route('user.transaksi.show', $transaksi->id_transaksi) }}" class="hover:text-primary transition-colors">Detail Transaksi</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary font-bold">Beri Ulasan</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
                
                {{-- Left Column: Form --}}
                <div class="lg:col-span-8 space-y-lg">
                    
                    {{-- Transaction Info Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">receipt_long</span>
                            Detail Layanan
                        </h2>
                        
                        <div class="flex items-center gap-md p-md bg-primary-fixed/30 rounded-xl">
                            <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                {{ strtoupper(substr($transaksi->penyedia->nama, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-label-sm text-on-surface-variant">Penyedia Jasa</p>
                                <p class="font-headline-sm text-on-surface truncate">{{ $transaksi->penyedia->nama }}</p>
                            </div>
                            <div class="text-right hidden sm:block">
                                <p class="font-label-sm text-on-surface-variant">Jasa</p>
                                <p class="font-label-md text-on-surface font-medium">{{ $transaksi->jasa->nama_jasa }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Review Form Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">rate_review</span>
                            Penilaian Kamu
                        </h2>
                        
                        <form method="POST" action="{{ route('user.ulasan.store', $transaksi->id_transaksi) }}" class="space-y-xl" id="reviewForm">
                            @csrf

                            {{-- Star Rating --}}
                            <div>
                                <label class="block font-label-md text-on-surface mb-3">Rating <span class="text-error">*</span></label>
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
                                <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating') }}" required />
                                <p id="ratingText" class="mt-3 font-label-sm text-on-surface-variant italic">
                                    {{ old('rating') ? ['','Sangat Buruk','Buruk','Cukup','Bagus','Luar Biasa'][old('rating')] : 'Klik bintang untuk memberi nilai' }}
                                </p>
                                @error('rating')
                                    <p class="mt-2 font-label-sm text-error flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">error</span> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Komentar --}}
                            <div>
                                <label for="komentar" class="block font-label-md text-on-surface mb-2">
                                    Ulasan <span class="text-on-surface-variant font-normal">(Opsional)</span>
                                </label>
                                <textarea id="komentar" name="komentar" rows="5" maxlength="500"
                                    class="form-input"
                                    placeholder="Ceritakan pengalamanmu menggunakan jasa ini...">{{ old('komentar') }}</textarea>
                                <div class="flex justify-between mt-2">
                                    <p class="font-label-sm text-on-surface-variant">Maksimal 500 karakter</p>
                                    <p id="charCount" class="font-label-sm text-on-surface-variant">{{ strlen(old('komentar')) }}/500</p>
                                </div>
                                @error('komentar')
                                    <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex items-center gap-6 pt-lg border-t border-outline-variant/50 mt-xl">
                                <button type="submit" 
                                    class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[20px]">send</span>
                                    Kirim Ulasan
                                </button>
                                
                                <a href="{{ route('user.transaksi.show', $transaksi->id_transaksi) }}"
                                   class="px-xl py-md border border-outline-variant text-on-surface-variant font-label-md rounded-xl hover:bg-surface-container-low transition-all flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[20px]">close</span>
                                    Lewati
                                </a>
                            </div>
                        </form>
                    </div>

                </div>

                {{-- Right Column: Tips --}}
                <div class="lg:col-span-4 space-y-lg">
                    <div class="bg-primary-fixed/20 border border-primary/10 rounded-2xl p-xl sticky top-24">
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">lightbulb</span>
                            Tips Memberi Ulasan
                        </h3>
                        <ul class="space-y-md font-body-sm text-on-surface-variant leading-relaxed">
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Jujur dan objektif berdasarkan pengalaman nyata.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Sebutkan hal spesifik yang kamu sukai atau kurang.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Ulasan membantu pengguna lain memilih penyedia jasa.</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')

    {{-- Interactive Scripts --}}
    <script>
        // Star Rating Logic
        const stars = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('ratingInput');
        const ratingText = document.getElementById('ratingText');
        let currentRating = parseInt(ratingInput.value) || 0;

        const labels = ['', 'Sangat Buruk', 'Buruk', 'Cukup', 'Bagus', 'Luar Biasa'];

        // Initialize stars if old input exists
        if (currentRating > 0) {
            updateStars(currentRating);
            ratingText.textContent = labels[currentRating];
            ratingText.classList.remove('text-on-surface-variant', 'italic');
            ratingText.classList.add('text-primary', 'font-bold');
        }

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

        // Character Counter
        const textarea = document.getElementById('komentar');
        const charCount = document.getElementById('charCount');
        if (textarea && charCount) {
            textarea.addEventListener('input', function() {
                charCount.textContent = `${this.value.length}/500`;
            });
        }
    </script>
</body>
</html>