<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Manajemen Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .primary-gradient { background: linear-gradient(135deg, #712ae2 0%, #1f108e 100%); }
        .dataTables_wrapper .dataTables_filter input { padding: 0.3rem 0.5rem; border-radius: 0.375rem; border: 1px solid #e5e7eb; margin-bottom: 1rem; }
        .dataTables_wrapper .dataTables_length select { padding-right: 2.5rem !important; }
    </style>
</head>
<body class="text-gray-800">

@include('admin.partials.sidebar')

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Transaksi</h1>
            <p class="text-sm text-gray-500 mt-1">Verifikasi dan pantau semua aktivitas barter jasa</p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-amber-600">{{ $stats['pending'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Pending</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-blue-600">{{ $stats['proses'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Proses</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-emerald-600">{{ $stats['selesai'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Selesai</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-red-600">{{ $stats['dibatalkan'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Dibatalkan</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-indigo-600">{{ number_format($stats['total_poin']) }}</p>
            <p class="text-xs text-gray-500 mt-1">Poin Tersalurkan</p>
        </div>
    </div>

    {{-- Filter Tabs --}}
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('backoffice.transaksi.index') }}" 
           class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ !request('status') ? 'primary-gradient text-white shadow-md' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Semua ({{ $stats['total'] }})
        </a>
        <a href="{{ route('backoffice.transaksi.index', ['status' => 'pending']) }}" 
           class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') === 'pending' ? 'bg-amber-100 text-amber-700 border border-amber-200' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Pending
        </a>
        <a href="{{ route('backoffice.transaksi.index', ['status' => 'proses']) }}" 
           class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') === 'proses' ? 'bg-blue-100 text-blue-700 border border-blue-200' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Proses
        </a>
        <a href="{{ route('backoffice.transaksi.index', ['status' => 'selesai']) }}" 
           class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') === 'selesai' ? 'bg-emerald-100 text-emerald-700 border border-emerald-200' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Selesai
        </a>
        <a href="{{ route('backoffice.transaksi.index', ['status' => 'dibatalkan']) }}" 
           class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('status') === 'dibatalkan' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' }}">
            Dibatalkan
        </a>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <div class="overflow-x-auto">
            <table id="datatable" class="display min-w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">ID</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Jasa</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Penyedia</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Penerima</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Poin</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Tanggal</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($transaksis as $t)
                        @php
                            $badge = match($t->status) {
                                'pending'    => 'bg-amber-100 text-amber-700',
                                'proses'     => 'bg-blue-100 text-blue-700',
                                'selesai'    => 'bg-emerald-100 text-emerald-700',
                                'dibatalkan' => 'bg-red-100 text-red-700',
                                default      => 'bg-gray-100 text-gray-600',
                            };
                            $statusLabel = match($t->status) {
                                'pending'    => 'Pending',
                                'proses'     => 'Proses',
                                'selesai'    => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                                default      => ucfirst($t->status),
                            };
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-mono text-xs text-gray-500">#{{ $t->id_transaksi }}</td>
                            <td class="px-4 py-3">
                                <p class="font-semibold text-gray-800 line-clamp-1 max-w-[200px]">{{ $t->jasa->nama_jasa ?? 'Jasa Dihapus' }}</p>
                                <p class="text-xs text-gray-400">{{ $t->jasa->kategori->nama_kategori ?? '-' }}</p>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $t->penyedia->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $t->penerima->nama ?? '-' }}</td>
                            <td class="px-4 py-3 font-bold text-indigo-600">{{ number_format($t->jumlah_poin) }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $badge }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-400 text-xs">{{ \Carbon\Carbon::parse($t->tgl_transaksi)->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2 flex-wrap">
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('backoffice.transaksi.show', $t->id_transaksi) }}"
                                       class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[16px]">visibility</span>
                                        Detail
                                    </a>

                                    {{-- Tombol Batalkan (Hanya muncul jika status bukan selesai/dibatalkan) --}}
                                    @if(!in_array($t->status, ['selesai', 'dibatalkan']))
                                        <form action="{{ route('backoffice.transaksi.updateStatus', $t->id_transaksi) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin membatalkan transaksi #{{ $t->id_transaksi }}? Poin akan dikembalikan ke penerima.')">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="dibatalkan">
                                            
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-semibold transition flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[16px]">block</span>
                                                Batal
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($transaksis instanceof \Illuminate\Pagination\LengthAwarePaginator && $transaksis->hasPages())
            <div class="mt-6 flex justify-center">
                {{ $transaksis->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            paging: false, // Matikan pagination DataTables karena kita pakai Laravel paginator
            searching: true,
            info: false,
            language: {
                search: "Cari transaksi:",
                emptyTable: "Tidak ada data transaksi ditemukan",
                zeroRecords: "Tidak ada data yang cocok dengan pencarian"
            }
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