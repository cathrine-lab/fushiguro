<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Request Jasa | Tukar Jasa'])
    
    <style>
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
        @include('user.partials.header', ['title' => 'Request Jasa'])
        
        <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop mt-xl space-y-lg">
            
            {{-- Breadcrumbs --}}
            <nav class="flex items-center gap-xs text-on-surface-variant font-label-sm text-label-sm mb-lg">
                <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}" class="hover:text-primary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    Kembali ke Detail Jasa
                </a>
            </nav>

            {{-- Info Jasa Card --}}
            <div class="surface-card rounded-2xl p-xl md:p-2xl">
                <div class="flex items-start gap-md mb-lg">
                    <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary flex-shrink-0">
                        <span class="material-symbols-outlined text-[24px]">design_services</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface truncate">{{ $jasa->nama_jasa }}</h3>
                        <p class="font-label-sm text-on-surface-variant mt-1">oleh {{ $jasa->pemilik->nama }}</p>
                    </div>
                    <div class="text-right flex-shrink-0">
                        <p class="font-label-sm text-on-surface-variant">Harga Tetap</p>
                        <p class="font-headline-sm text-primary font-bold">{{ number_format($jasa->poin) }} Pts</p>
                    </div>
                </div>
                
                <div class="bg-surface-container-low rounded-xl p-md">
                    <p class="font-body-sm text-on-surface-variant leading-relaxed line-clamp-3">
                        {{ $jasa->deskripsi }}
                    </p>
                </div>
            </div>

            {{-- Saldo Poin Card --}}
            <div class="bg-primary-fixed/30 border border-primary/10 rounded-2xl p-lg flex items-center gap-md">
                <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white flex-shrink-0">
                    <span class="material-symbols-outlined text-[24px]">account_balance_wallet</span>
                </div>
                <div>
                    <p class="font-label-sm text-on-surface-variant">Saldo Poin Kamu</p>
                    <p class="font-display-lg text-display-lg text-primary leading-none">
                        {{ number_format(Auth::user()->poin) }} 
                        <span class="text-headline-sm font-headline-sm text-on-surface-variant">Pts</span>
                    </p>
                </div>
            </div>

            {{-- Form Request --}}
            <div class="surface-card rounded-2xl p-xl md:p-2xl">
                @if($errors->has('jumlah_poin'))
    <div class="bg-error-container/50 border border-error/20 rounded-xl p-md flex items-start gap-sm mb-lg">
        <span class="material-symbols-outlined text-error text-[20px] flex-shrink-0 mt-0.5">error</span>
        <p class="font-body-sm text-error">{{ $errors->first('jumlah_poin') }}</p>
    </div>
@endif
                <form action="{{ route('user.transaksi.store') }}" method="POST" class="space-y-xl">
                    @csrf
                    <input type="hidden" name="id_jasa" value="{{ $jasa->id_jasa }}">
                    <input type="hidden" name="jumlah_poin" value="{{ $jasa->poin }}">

                    {{-- Catatan untuk Penyedia (PERBAIKAN DI SINI) --}}
                    <div>
                        <label for="catatan" class="block font-label-md text-on-surface mb-2 font-medium">
                            Catatan untuk Penyedia (Opsional)
                        </label>
                        
                        {{-- SOLUSI: Class ditulis langsung di elemen HTML agar pasti jalan --}}
                        <textarea id="catatan" name="catatan" rows="4" 
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-xl 
                                   text-on-surface font-body-sm focus:outline-none focus:ring-2 focus:ring-primary/20 
                                   focus:border-primary transition-all placeholder:text-on-surface-variant/50 resize-y min-h-[120px]" 
                            placeholder="Jelaskan detail kebutuhan Anda, deadline, atau hal lain yang perlu diketahui penyedia...">{{ old('catatan') }}</textarea>
                            
                        @error('catatan')
                            <p class="mt-2 font-label-sm text-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Warning Note --}}
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-md flex items-start gap-sm">
                        <span class="material-symbols-outlined text-amber-600 text-[20px] flex-shrink-0 mt-0.5">warning</span>
                        <div>
                            <p class="font-label-sm text-amber-800 font-semibold mb-1">Perhatian</p>
                            <p class="font-body-sm text-amber-700 leading-relaxed">
                                Poin sebesar <strong>{{ number_format($jasa->poin) }} Pts</strong> akan dipotong dari saldo Anda setelah penyedia menandai transaksi sebagai <strong>selesai</strong>. Pastikan saldo Anda mencukupi.
                            </p>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center gap-6 pt-lg border-t border-outline-variant/50 mt-xl">
                        <button type="submit" 
                            class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-md hover:scale-[0.98] active:scale-95 transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-[20px]">send</span>
                            Kirim Request
                        </button>
                        
                        <a href="{{ route('user.jasa.show', $jasa->id_jasa) }}"
                           class="px-xl py-md border border-outline-variant text-on-surface-variant font-label-md rounded-xl hover:bg-surface-container-low transition-all flex items-center gap-2">
                            <span class="material-symbols-outlined text-[20px]">close</span>
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </main>

    {{-- Footer Partial --}}
    @include('user.partials.footer')
</body>
</html>