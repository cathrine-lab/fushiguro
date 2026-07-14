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
        
        /* Custom scrollbar for textarea if needed */
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
                    <a href="{{ route('user.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <a href="{{ route('user.jasa.index') }}" class="hover:text-primary transition-colors">Jasa Saya</a>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    <span class="text-primary font-bold">Post a Service</span>
                </nav>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Create New Service</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-xs">Share your expertise and start earning skill points from the community.</p>
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
                                    <p class="font-label-md text-on-surface">Basic Info</p>
                                    <p class="font-label-sm text-on-surface-variant">Core service details</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-md opacity-60">
                                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold step-inactive">2</span>
                                <div>
                                    <p class="font-label-md text-on-surface-variant">Portfolio</p>
                                    <p class="font-label-sm text-on-surface-variant">Showcase your work</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-md opacity-60">
                                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold step-inactive">3</span>
                                <div>
                                    <p class="font-label-md text-on-surface-variant">Contact</p>
                                    <p class="font-label-sm text-on-surface-variant">Communication info</p>
                                </div>
                            </li>
                        </ul>
                        <p class="mt-xl font-label-sm text-on-surface-variant leading-relaxed border-t border-outline-variant pt-lg">
                            Setelah disimpan, jasa kamu langsung tampil di halaman Browse dan bisa ditukar pengguna lain.
                        </p>
                    </div>
                </div>

                {{-- Form Body --}}
                <div class="col-span-12 md:col-span-9 flex flex-col gap-gutter">
                    
                    {{-- Section 1: Basic Information --}}
                    <section class="glass-card rounded-2xl p-xl md:p-2xl">
                        <div class="flex items-center gap-md mb-xl">
                            <span class="material-symbols-outlined text-primary text-3xl">info</span>
                            <h3 class="font-headline-md text-headline-md">Service Details</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
                            {{-- Nama Jasa --}}
                            <div class="col-span-2">
                                <label for="nama_jasa" class="block font-label-md text-on-surface-variant mb-xs">
                                    Service Title <span class="text-error">*</span>
                                </label>
                                <input id="nama_jasa" name="nama_jasa" value="{{ old('nama_jasa') }}"
                                    class="w-full h-11 px-md rounded-xl border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none @error('nama_jasa') border-error @enderror"
                                    placeholder="e.g. Advanced React.js Tutoring or Custom Logo Design" type="text" required autofocus />
                                @error('nama_jasa')<p class="mt-1 font-label-sm text-error">{{ $message }}</p>@enderror
                            </div>

                            {{-- Kategori --}}
                            <div class="col-span-2 md:col-span-1">
                                <label for="id_kategori" class="block font-label-md text-on-surface-variant mb-xs">
                                    Category <span class="text-error">*</span>
                                </label>
                                <select id="id_kategori" name="id_kategori"
                                    class="w-full h-11 px-md rounded-xl border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface @error('id_kategori') border-error @enderror"
                                    required>
                                    <option value="">Select a Category</option>
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
                                <label class="block font-label-md text-on-surface-variant mb-xs">
                                    Required Points (per task)
                                </label>
                                <div class="relative">
                                    <input disabled
                                        class="w-full h-11 pl-md pr-12 rounded-xl border border-outline-variant bg-surface-container-low text-on-surface-variant cursor-not-allowed outline-none"
                                        placeholder="Flexible" type="text" />
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 font-label-sm text-on-surface-variant">PTS</span>
                                </div>
                                <p class="mt-xs font-label-sm text-on-surface-variant flex items-center gap-xs">
                                    <span class="material-symbols-outlined text-sm">info</span>
                                    Points are negotiated per request.
                                </p>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="col-span-2">
                                <label for="deskripsi" class="block font-label-md text-on-surface-variant mb-xs">
                                    Service Description <span class="text-error">*</span>
                                </label>
                                <textarea id="deskripsi" name="deskripsi" rows="6"
                                    class="w-full p-md rounded-xl border border-outline-variant focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none resize-none @error('deskripsi') border-error @enderror"
                                    placeholder="Describe what you offer in detail, including specific deliverables and your process..." required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')<p class="mt-1 font-label-sm text-error">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </section>

                    {{-- Section 2: Portfolio Upload (Coming Soon) --}}
                    <section class="glass-card rounded-2xl p-xl md:p-2xl relative opacity-75">
                        <span class="absolute top-lg right-lg bg-secondary-fixed text-secondary px-md py-xs rounded-full font-label-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">schedule</span>
                            Coming Soon
                        </span>
                        <div class="flex items-center gap-md mb-xl">
                            <span class="material-symbols-outlined text-primary text-3xl">image</span>
                            <h3 class="font-headline-md text-headline-md">Portfolio Showcase</h3>
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-lg">Add up to 4 high-quality images of your previous work to build trust with potential partners.</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-lg">
                            <label class="aspect-square border-2 border-dashed border-outline-variant/50 rounded-2xl flex flex-col items-center justify-center gap-sm cursor-not-allowed bg-surface-container-low/50">
                                <span class="material-symbols-outlined text-3xl text-outline-variant">add_a_photo</span>
                                <span class="font-label-sm text-on-surface-variant">Main Image</span>
                            </label>
                            <div class="aspect-square border-2 border-dashed border-outline-variant/50 rounded-2xl flex items-center justify-center bg-surface-container-low">
                                <span class="material-symbols-outlined text-outline-variant">image_not_supported</span>
                            </div>
                            <div class="aspect-square border-2 border-dashed border-outline-variant/50 rounded-2xl flex items-center justify-center bg-surface-container-low">
                                <span class="material-symbols-outlined text-outline-variant">image_not_supported</span>
                            </div>
                            <div class="aspect-square border-2 border-dashed border-outline-variant/50 rounded-2xl flex items-center justify-center bg-surface-container-low">
                                <span class="material-symbols-outlined text-outline-variant">image_not_supported</span>
                            </div>
                        </div>
                    </section>

                    {{-- Section 3: Contact & Communication (Coming Soon) --}}
                    <section class="glass-card rounded-2xl p-xl md:p-2xl relative opacity-75">
                        <span class="absolute top-lg right-lg bg-secondary-fixed text-secondary px-md py-xs rounded-full font-label-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">schedule</span>
                            Coming Soon
                        </span>
                        <div class="flex items-center gap-md mb-xl">
                            <span class="material-symbols-outlined text-primary text-3xl">contact_support</span>
                            <h3 class="font-headline-md text-headline-md">Contact Method</h3>
                        </div>
                        <div class="max-w-xl">
                            <label class="block font-label-md text-on-surface-variant mb-xs">WhatsApp Direct Link</label>
                            <div class="flex gap-xs">
                                <div class="h-11 px-md rounded-xl border border-outline-variant bg-surface-container flex items-center font-body-sm text-on-surface-variant">wa.me/</div>
                                <input disabled
                                    class="flex-1 h-11 px-md rounded-xl border border-outline-variant bg-surface-container-low text-on-surface-variant cursor-not-allowed outline-none"
                                    placeholder="6281234567890" type="text" />
                            </div>
                            <p class="mt-sm font-label-sm text-on-surface-variant flex items-center gap-xs">
                                <span class="material-symbols-outlined text-sm">lock</span>
                                Your contact info is only shared after a swap is mutually accepted.
                            </p>
                        </div>
                    </section>

                    {{-- Form Footer Actions --}}
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-lg mt-xl pb-2xl">
                        <p class="font-body-sm text-on-surface-variant italic order-2 sm:order-1">
                            Jasa langsung aktif setelah disimpan.
                        </p>
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