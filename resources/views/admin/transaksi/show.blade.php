<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Detail Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
    </style>
</head>
<body class="text-gray-800">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('backoffice.transaksi.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Detail Transaksi</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left Column: Transaction Info --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Status Badge & Basic Info --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">ID Transaksi</p>
                        <p class="font-mono text-lg font-bold text-gray-800">#{{ $transaksi->id_transaksi }}</p>
                    </div>
                    @php
                        $badge = match($transaksi->status) {
                            'pending'    => ['bg-amber-100 text-amber-700', 'Menunggu Konfirmasi'],
                            'proses'     => ['bg-blue-100 text-blue-700',     'Sedang Dikerjakan'],
                            'selesai'    => ['bg-emerald-100 text-emerald-700','Selesai'],
                            'dibatalkan' => ['bg-red-100 text-red-700',       'Dibatalkan'],
                        };
                    @endphp
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $badge[0] }}">
                        {{ $badge[1] }}
                    </span>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 bg-indigo-50 rounded-xl">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0">
                            <span class="material-symbols-outlined text-[20px]">design_services</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Jasa</p>
                            <p class="font-bold text-gray-800">{{ $transaksi->jasa->nama_jasa }}</p>
                            <p class="text-sm text-gray-500 mt-0.5">{{ $transaksi->jasa->kategori->nama_kategori }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">Harga</p>
                            <p class="font-bold text-indigo-600">{{ number_format($transaksi->jumlah_poin) }} Pts</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-4 bg-gray-50 rounded-xl">
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-2">Penyedia Jasa</p>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full primary-gradient flex items-center justify-center text-white font-bold text-xs">
                                    {{ strtoupper(substr($transaksi->penyedia->nama, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $transaksi->penyedia->nama }}</span>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-xl">
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-2">Penerima Jasa</p>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-sky-100 flex items-center justify-center text-sky-600 font-bold text-xs">
                                    {{ strtoupper(substr($transaksi->penerima->nama, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $transaksi->penerima->nama }}</span>
                            </div>
                        </div>
                    </div>

                    @if($transaksi->catatan)
                    <div class="p-4 bg-yellow-50 border border-yellow-100 rounded-xl">
                        <p class="text-xs text-yellow-600 uppercase tracking-wider font-semibold mb-2 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">note_alt</span> Catatan Penerima
                        </p>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $transaksi->catatan }}</p>
                    </div>
                    @endif

                    <div class="pt-4 border-t border-gray-100 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-400">Tanggal Request</p>
                            <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->format('d M Y, H:i') }}</p>
                        </div>
                        @if($transaksi->tgl_selesai)
                        <div>
                            <p class="text-gray-400">Tanggal Selesai</p>
                            <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($transaksi->tgl_selesai)->format('d M Y, H:i') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Review Section (If Exists) --}}
            @if($transaksi->ulasan)
            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-yellow-500">star</span> Ulasan
                </h3>
                <div class="flex items-center gap-1 text-yellow-500 mb-3">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' {{ $i <= $transaksi->ulasan->rating ? 1 : 0 }}">star</span>
                    @endfor
                    <span class="ml-2 text-sm font-bold text-gray-800">{{ $transaksi->ulasan->rating }}/5</span>
                </div>
                @if($transaksi->ulasan->komentar)
                    <p class="text-gray-600 italic bg-gray-50 p-4 rounded-xl">"{{ $transaksi->ulasan->komentar }}"</p>
                @endif
                <p class="text-xs text-gray-400 mt-3">Oleh {{ $transaksi->ulasan->pengguna->nama }} • {{ $transaksi->ulasan->created_at->diffForHumans() }}</p>
            </div>
            @endif

        </div>

        {{-- Right Column: Admin Actions --}}
        <div class="space-y-6">
            
            {{-- VERIFIKASI ADMIN PANEL --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-6 sticky top-6">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-indigo-600">admin_panel_settings</span>
                    Verifikasi Admin
                </h3>

                @if($transaksi->status === 'pending')
                    <form action="{{ route('backoffice.transaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST" class="space-y-3">
                        @csrf @method('PATCH')
                        
                        <button type="submit" name="status" value="proses"
                            onclick="return confirm('Terima transaksi ini? Status akan berubah menjadi Proses.')"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl text-sm font-semibold transition flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">play_arrow</span> Terima & Proses
                        </button>
                        
                        <button type="submit" name="status" value="dibatalkan"
                            onclick="return confirm('Batalkan transaksi ini? Poin akan dikembalikan ke penerima.')"
                            class="w-full border border-red-500 text-red-600 hover:bg-red-50 py-2.5 rounded-xl text-sm font-semibold transition flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">block</span> Batalkan Transaksi
                        </button>
                    </form>

                @elseif($transaksi->status === 'proses')
                    <form action="{{ route('backoffice.transaksi.updateStatus', $transaksi->id_transaksi) }}" method="POST" class="space-y-3">
                        @csrf @method('PATCH')
                        
                        <button type="submit" name="status" value="selesai"
                            onclick="return confirm('Selesaikan transaksi? Poin akan langsung ditransfer ke penyedia.')"
                            class="w-full primary-gradient text-white py-2.5 rounded-xl text-sm font-semibold transition flex items-center justify-center gap-2 shadow-lg shadow-indigo-200">
                            <span class="material-symbols-outlined text-[18px]">check_circle</span> Tandai Selesai & Transfer Poin
                        </button>
                        
                        <button type="submit" name="status" value="dibatalkan"
                            onclick="return confirm('Batalkan transaksi yang sedang berjalan? Poin akan dikembalikan.')"
                            class="w-full border border-red-500 text-red-600 hover:bg-red-50 py-2.5 rounded-xl text-sm font-semibold transition flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">cancel</span> Batalkan Transaksi
                        </button>
                    </form>

                @else
                    <div class="text-center py-6 bg-gray-50 rounded-xl border border-gray-100">
                        <span class="material-symbols-outlined text-4xl text-gray-300 mb-2">lock</span>
                        <p class="text-sm font-semibold text-gray-600">Transaksi {{ ucfirst($transaksi->status) }}</p>
                        <p class="text-xs text-gray-400 mt-1 px-4">Tidak ada aksi verifikasi yang tersedia untuk status ini.</p>
                    </div>
                @endif
            </div>

            {{-- Quick Stats Card --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                <h3 class="font-bold text-gray-800 mb-4 text-sm">Ringkasan Transaksi</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-sm text-gray-500">Total Poin Terlibat</span>
                        <span class="font-bold text-indigo-600">{{ number_format($transaksi->jumlah_poin) }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-sm text-gray-500">Saldo Penyedia Saat Ini</span>
                        <span class="font-bold text-gray-800">{{ number_format($transaksi->penyedia->poin) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Saldo Penerima Saat Ini</span>
                        <span class="font-bold text-gray-800">{{ number_format($transaksi->penerima->poin) }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>

<script>
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