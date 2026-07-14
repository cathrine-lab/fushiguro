<!DOCTYPE html>
<html class="light" lang="en">
<head>
    @include('user.partials.head', ['pageTitle' => 'Jasa Saya | Tukar Jasa'])
</head>
<body class="font-body-md text-on-surface bg-background flex flex-col min-h-screen">
    
    {{-- Sidebar User --}}
    @include('user.partials.sidebar')
    
    {{-- Main Content --}}
    <main class="md:ml-[280px] min-h-screen pt-16 flex-1">
        
        {{-- Header Global --}}
        @include('user.partials.header', ['title' => 'Jasa Saya'])
        
        <div class="p-margin-mobile md:p-margin-desktop space-y-xl">
            
            {{-- Header & Tombol Tambah --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-lg mb-lg">
                <div>
                    <h2 class="font-headline-sm text-headline-sm text-on-surface">Layanan Saya</h2>
                    {{-- DESKRIPSI BARU --}}
                    <p class="font-body-sm text-on-surface-variant mt-xs max-w-2xl">
                        Kelola layanan yang Anda tawarkan, perbarui informasi, dan pantau statusnya.
                    </p>
                </div>
                <a href="{{ route('user.jasa.create') }}"
                   class="primary-gradient text-white px-lg py-sm rounded-xl text-label-md font-bold hover:opacity-90 transition flex items-center gap-sm shadow-sm whitespace-nowrap">
                    <span class="material-symbols-outlined text-[18px]">add_circle</span>
                    Tambah Jasa
                </a>
            </div>

            {{-- Empty State --}}
            @if($jasas->isEmpty())
                <div class="bg-surface-container-lowest border border-outline-variant rounded-3xl p-2xl flex flex-col items-center justify-center text-center">
                    <div class="w-20 h-20 rounded-2xl bg-primary-fixed flex items-center justify-center mb-lg">
                        <span class="material-symbols-outlined text-[40px] text-primary">design_services</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-sm">Belum ada jasa</h3>
                    <p class="font-body-sm text-on-surface-variant max-w-sm mb-lg">
                        Mulai tambahkan jasa yang kamu tawarkan untuk mendapatkan poin dari pengguna lain.
                    </p>
                    <a href="{{ route('user.jasa.create') }}"
                       class="primary-gradient text-white px-xl py-md rounded-xl font-label-md shadow-sm hover:opacity-90 transition">
                        + Tambah Jasa Pertama
                    </a>
                </div>
            @else
                {{-- Grid Jasa --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-lg">
                    @foreach($jasas as $jasa)
                        <div class="bg-surface-container-lowest border border-outline-variant rounded-2xl p-lg flex flex-col gap-md hover:shadow-md transition group">
                            <div class="flex items-start justify-between">
                                <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
                                    <span class="material-symbols-outlined">design_services</span>
                                </div>
                                <span class="text-xs font-medium bg-secondary-fixed text-secondary px-3 py-1 rounded-full">
                                    {{ $jasa->kategori->nama_kategori }}
                                </span>
                            </div>
                            
                            <div>
                                <h3 class="font-label-md text-on-surface group-hover:text-primary transition-colors truncate">{{ $jasa->nama_jasa }}</h3>
                                <p class="text-sm text-on-surface-variant mt-1 line-clamp-2">{{ $jasa->deskripsi }}</p>
                            </div>

                            <div class="flex gap-2 mt-auto pt-2 border-t border-outline-variant">
                                <a href="{{ route('user.jasa.edit', $jasa->id_jasa) }}"
                                   class="flex-1 text-center bg-surface-container-high hover:bg-secondary-fixed hover:text-secondary text-on-surface-variant text-label-md font-bold py-2 rounded-lg transition">
                                    Edit
                                </a>
                                <button onclick="confirmDelete('{{ $jasa->id_jasa }}')"
                                        class="flex-1 bg-error-container/50 hover:bg-error-container text-error font-bold text-label-md py-2 rounded-lg transition">
                                    Hapus
                                </button>
                                <form id="delete-form-{{ $jasa->id_jasa }}"
                                      action="{{ route('user.jasa.destroy', $jasa->id_jasa) }}"
                                      method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus jasa ini?',
                text: "Jasa yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ba1a1a',
                cancelButtonColor: '#777584',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

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