<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Post a Service | Tukar Jasa'])
    
    <style>
        .glass-card { 
            background: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(12px); 
            border: 1px solid #E2E8F0; 
        }
        .step-active { background-color: #3730a3; color: white; }
        .step-inactive { background-color: #eceef0; color: #464553; }
        
        textarea::-webkit-scrollbar { width: 8px; }
        textarea::-webkit-scrollbar-track { background: transparent; }
        textarea::-webkit-scrollbar-thumb { background: #c8c4d5; border-radius: 4px; }
    </style>
</head>
<body class="text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar User --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content Canvas --}}
    <main class="md:ml-[280px] min-h-screen p-margin-mobile md:p-margin-desktop pb-24 md:pb-0 pt-16 flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Post a Service'])
        
        {{-- Breadcrumbs & Page Title --}}
        <header class="mb-2xl md:mb-3xl mt-xl flex flex-col md:flex-row justify-between items-start md:items-end gap-lg">
            <div>
                <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-sm">
                    <a href="{{ route('user.dashboard') }}" class="hover:text-primary transition-colors">Home</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <a href="{{ route('user.jasa.index') }}" class="hover:text-primary transition-colors">Jasa Saya</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <span class="text-primary font-bold">Posting Jasa</span>
                </nav>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Buat Jasa Baru</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-xs">Bagikan keahlian Anda dan kumpulkan poin keterampilan dari komunitas.</p>
            </div>
        </header>

        <form method="POST" action="{{ route('user.jasa.store') }}" id="serviceForm">
            @csrf
            
            <div class="grid grid-cols-12 gap-gutter">
                
                {{-- Multi-step Progress Indicator (Sticky Left) --}}
                <div class="col-span-12 md:col-span-3">
                    <div class="glass-card rounded-2xl p-lg md:sticky md:top-24">
                        <ul class="flex flex-col gap-xl">
                            <li class="flex items-center gap-md group">
                                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold step-active shadow-md">1</span>
                                <div>
                                    <p class="font-label-md text-on-surface">Informasi Dasar</p>
                                    <p class="font-label-sm text-on-surface-variant">Detail utama jasa</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-md opacity-60">
                                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold step-inactive">2</span>
                                <div>
                                    <p class="font-label-md text-on-surface-variant">Portofolio</p>
                                    <p class="font-label-sm text-on-surface-variant">Tampilkan hasil karya Anda</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-md opacity-60">
                                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold step-inactive">3</span>
                                <div>
                                    <p class="font-label-md text-on-surface-variant">Kontak</p>
                                    <p class="font-label-sm text-on-surface-variant">Informasi untuk komunikasi</p>
                                </div>
                            </li>
                        </ul>
                        <p class="mt-xl font-label-sm text-on-surface-variant leading-relaxed border-t border-outline-variant pt-lg">
                            Jasa Anda akan langsung tampil di halaman Explore dan siap ditukar.
                        </p>
                    </div>
                </div>

                {{-- Form Body --}}
                <div class="col-span-12 md:col-span-9 flex flex-col gap-gutter">
                    
                    {{-- Section 1: Basic Information --}}
                    <section class="glass-card rounded-2xl p-xl md:p-2xl">
                        <div class="flex items-center gap-md mb-xl">
                            <span class="material-symbols-outlined text-primary text-3xl">info</span>
                            <h3 class="font-headline-md text-headline-md">Detail Jasa</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
                            {{-- Nama Jasa --}}
                            <div class="col-span-2">
                                <label for="nama_jasa" class="block font-label-md text-on-surface-variant mb-xs">
                                    Judul <span class="text-error">*</span>
                                </label>
                                <input id="nama_jasa" name="nama_jasa" value="{{ old('nama_jasa') }}"
                                    class="w-full h-11 px-md rounded-xl border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none @error('nama_jasa') border-error @enderror"
                                    placeholder="Contoh: Tutor React.js Tingkat Lanjut atau Desain Logo Kustom" type="text" required autofocus />
                                @error('nama_jasa')<p class="mt-1 font-label-sm text-error">{{ $message }}</p>@enderror
                            </div>

                            {{-- Kategori --}}
                            <div class="col-span-2 md:col-span-1">
                                <label for="id_kategori" class="block font-label-md text-on-surface-variant mb-xs">
                                    Kategori <span class="text-error">*</span>
                                </label>
                                <select id="id_kategori" name="id_kategori"
                                    class="w-full h-11 px-md rounded-xl border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface @error('id_kategori') border-error @enderror"
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoris as $kat)
                                        <option value="{{ $kat->id_kategori }}" {{ old('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                            {{ $kat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')<p class="mt-1 font-label-sm text-error">{{ $message }}</p>@enderror
                            </div>

                            {{-- Poin (Informasi Saja) --}}
                            <div class="col-span-2 md:col-span-1">
                                <label for="poin" class="form-label">Harga Poin <span class="text-error">*</span></label>
                                <div class="relative">
                                    <input id="poin" name="poin" type="number" min="1"
            class="form-input pl-4 pr-16 @error('poin') border-error focus:ring-error/20 focus:border-error @enderror" 
            value="{{ old('poin', $jasa->poin ?? 0) }}" required />
        <span class="absolute right-4 top-1/2 -translate-y-1/2 font-label-sm text-on-surface-variant pointer-events-none">PTS</span>
    </div>
    @error('poin')
        <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
    @enderror
</div>

                            {{-- Deskripsi --}}
                            <div class="col-span-2">
                                <label for="deskripsi" class="block font-label-md text-on-surface-variant mb-xs">
                                    Deskripsi <span class="text-error">*</span>
                                </label>
                                <textarea id="deskripsi" name="deskripsi" rows="6"
                                    class="w-full p-md rounded-xl border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none resize-none @error('deskripsi') border-error @enderror"
                                    placeholder="Jelaskan jasa yang Anda tawarkan, hasil yang akan diterima, dan proses pengerjaannya..." required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')<p class="mt-1 font-label-sm text-error">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </section>

                    {{-- Form Footer Actions --}}
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-lg mt-xl pb-2xl">
                        <div class="flex gap-md order-1 sm:order-2 w-full sm:w-auto">
                            <a href="{{ route('user.jasa.index') }}"
                                class="flex-1 sm:flex-none text-center px-xl py-md border border-outline-variant text-primary font-label-md rounded-xl hover:bg-surface-container-low transition-all">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 sm:flex-none px-xl py-md primary-gradient text-white font-label-md rounded-xl shadow-lg hover:shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                                Submit Service
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')

    {{-- Mobile Nav --}}
    <nav class="md:hidden fixed bottom-0 left-0 w-full h-16 bg-surface/90 backdrop-blur-md border-t border-outline-variant flex items-center justify-around z-50">
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="font-label-sm text-[10px]">Home</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-primary" href="{{ route('user.jasa.index') }}">
            <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">design_services</span>
            <span class="font-label-sm text-[10px]">My Services</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-on-surface-variant" href="{{ route('user.profil.show', Auth::id()) }}">
            <span class="material-symbols-outlined">person</span>
            <span class="font-label-sm text-[10px]">Profile</span>
        </a>
    </nav>

    <script>
        // Micro-interaction for form focus
        document.querySelectorAll('input:not([disabled]), select:not([disabled]), textarea:not([disabled])').forEach(element => {
            element.addEventListener('focus', () => {
                const section = element.closest('section');
                if (section) section.style.boxShadow = '0 10px 15px -3px rgba(55, 48, 163, 0.08)';
            });
            element.addEventListener('blur', () => {
                const section = element.closest('section');
                if (section) section.style.boxShadow = 'none';
            });
        });

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