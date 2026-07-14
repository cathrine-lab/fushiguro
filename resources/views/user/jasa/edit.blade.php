<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Edit Jasa | Tukar Jasa'])
    
    <style>
        .form-input {
            @apply w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-xl 
                   text-on-surface font-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20 
                   focus:border-primary transition-all placeholder:text-on-surface-variant/50;
        }
        .form-label {
            @apply block font-label-md text-on-surface mb-2 font-medium;
        }
        .surface-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 6px -1px rgba(31, 16, 142, 0.05);
        }
    </style>
</head>
<body class="font-body-md text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar User --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content --}}
    <main class="md:ml-[280px] min-h-screen pt-16 pb-3xl flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Edit Jasa'])
        
        <div class="max-w-5xl mx-auto px-margin-mobile md:px-margin-desktop mt-xl">
            
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-lg">
                <a href="{{ route('user.dashboard') }}" class="hover:text-primary transition-colors">Dashboard</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <a href="{{ route('user.jasa.index') }}" class="hover:text-primary transition-colors">Jasa Saya</a>
                <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                <span class="text-primary font-bold">Edit Jasa</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-lg">
                
                {{-- Left Column: Form --}}
                <div class="lg:col-span-8 space-y-lg">
                    
                    {{-- Edit Service Card --}}
                    <div class="surface-card rounded-2xl p-xl md:p-2xl">
                        <h2 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">edit_note</span>
                            Perbarui Informasi Jasa
                        </h2>
                        
                        <form method="POST" action="{{ route('user.jasa.update', $jasa->id_jasa) }}" class="space-y-xl">
    @csrf
    @method('PUT')

    {{-- Nama Jasa --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
        <label for="nama_jasa" class="md:col-span-3 font-label-md text-on-surface pt-3">
            Nama Jasa <span class="text-error">*</span>
        </label>
        <div class="md:col-span-9">
            <input id="nama_jasa" name="nama_jasa" type="text" 
                class="form-input @error('nama_jasa') border-error focus:ring-error/20 focus:border-error @enderror" 
                value="{{ old('nama_jasa', $jasa->nama_jasa) }}" required autofocus 
                placeholder="Contoh: Desain Logo Profesional, Les Matematika SD" />
            @error('nama_jasa')
                <p class="mt-2 font-label-sm text-error flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">error</span> {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    {{-- Kategori --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
        <label for="id_kategori" class="md:col-span-3 font-label-md text-on-surface pt-3">
            Kategori <span class="text-error">*</span>
        </label>
        <div class="md:col-span-9">
            <select id="id_kategori" name="id_kategori" 
                class="form-input bg-surface @error('id_kategori') border-error focus:ring-error/20 focus:border-error @enderror"
                required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kat)
                    <option value="{{ $kat->id_kategori }}" 
                        {{ old('id_kategori', $jasa->id_kategori) == $kat->id_kategori ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
    <label for="poin" class="md:col-span-3 font-label-md text-on-surface pt-3">
        Harga Poin <span class="text-error">*</span>
    </label>
    <div class="md:col-span-9">
        <div class="relative">
            <input id="poin" name="poin" type="number" min="1"
                class="form-input pr-16 @error('poin') border-error focus:ring-error/20 focus:border-error @enderror" 
                value="{{ old('poin', $jasa->poin ?? 0) }}" required />
            <span class="absolute right-4 top-1/2 -translate-y-1/2 font-label-sm text-on-surface-variant pointer-events-none">PTS</span>
        </div>
        @error('poin')
            <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
        @enderror
    </div>
</div>

    {{-- Deskripsi --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
        <label for="deskripsi" class="md:col-span-3 font-label-md text-on-surface pt-3">
            Deskripsi <span class="text-error">*</span>
        </label>
        <div class="md:col-span-9">
            <textarea id="deskripsi" name="deskripsi" rows="6" 
                class="form-input resize-none @error('deskripsi') border-error focus:ring-error/20 focus:border-error @enderror" 
                required placeholder="Jelaskan secara detail apa yang akan kamu kerjakan, durasi pengerjaan, dan hal-hal lain yang perlu diketahui penerima jasa...">{{ old('deskripsi', $jasa->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
            @enderror
            <p class="mt-2 font-label-sm text-on-surface-variant flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px]">info</span>
                Deskripsi yang jelas membantu calon partner memahami keahlianmu.
            </p>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex items-center gap-6 pt-lg border-t border-outline-variant/50 mt-xl">
        <button type="submit" 
            class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">save</span>
            Perbarui Jasa
        </button>
        
        <a href="{{ route('user.jasa.index') }}"
           class="px-xl py-md border border-outline-variant text-on-surface-variant font-label-md rounded-xl hover:bg-surface-container-low transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-[20px]">close</span>
            Batal
        </a>
    </div>
</form>
                    </div>

                </div>

                {{-- Right Column: Info Panel --}}
                <div class="lg:col-span-4 space-y-lg">
                    <div class="bg-primary-fixed/20 border border-primary/10 rounded-2xl p-xl sticky top-24">
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-lg flex items-center gap-sm">
                            <span class="material-symbols-outlined text-[24px]">info</span>
                            Tips Mengedit
                        </h3>
                        <ul class="space-y-md font-body-sm text-on-surface-variant leading-relaxed">
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Pastikan nama jasa tetap deskriptif dan mudah dipahami.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Kategori yang tepat membantu jasa lebih mudah ditemukan.</span>
                            </li>
                            <li class="flex gap-sm items-start">
                                <span class="material-symbols-outlined text-primary text-[20px] mt-0.5 flex-shrink-0">check_circle</span>
                                <span>Deskripsi detail meningkatkan kepercayaan calon partner barter.</span>
                            </li>
                        </ul>
                        
                        <div class="mt-xl pt-lg border-t border-primary/10">
                            <p class="font-label-sm text-on-surface-variant italic">
                                "Perubahan akan langsung terlihat di halaman Browse setelah disimpan."
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')
</body>
</html>