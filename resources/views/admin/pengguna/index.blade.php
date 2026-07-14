<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Manajemen Pengguna</title>
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

{{-- Hidden forms untuk submit ke server --}}
{{-- FIX: form PATCH tidak bisa dibuat di dalam SweetAlert pakai blade directive,
     jadi kita buat semua form di luar dan trigger via JS --}}
<div class="hidden">
    @foreach($penggunas as $p)
        {{-- Form Reset Password --}}
        <form id="reset-form-{{ $p->id_pengguna }}"
              action="{{ route('backoffice.pengguna.resetPassword', $p->id_pengguna) }}"
              method="POST">
            @csrf
            @method('PATCH')
        </form>

        {{-- Form Update Poin --}}
        <form id="poin-form-{{ $p->id_pengguna }}"
              action="{{ route('backoffice.pengguna.updatePoin', $p->id_pengguna) }}"
              method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="aksi" id="poin-aksi-{{ $p->id_pengguna }}">
            <input type="hidden" name="jumlah" id="poin-jumlah-{{ $p->id_pengguna }}">
        </form>

        {{-- Form Hapus --}}
        <form id="delete-form-{{ $p->id_pengguna }}"
              action="{{ route('backoffice.pengguna.destroy', $p->id_pengguna) }}"
              method="POST">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
</div>

<main class="md:ml-[280px] min-h-screen p-6 md:p-10">

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Pengguna</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola semua pengguna platform Tukar Jasa</p>
        </div>
    </div>

    {{-- Stat Mini --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-indigo-600">{{ $penggunas->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Pengguna</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-green-600">{{ number_format($penggunas->sum('poin')) }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Poin Beredar</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-purple-600">{{ $penggunas->sum('jasa_count') }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Jasa Diposting</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-blue-600">
                {{ $penggunas->sum('transaksi_sebagai_penyedia_count') + $penggunas->sum('transaksi_sebagai_penerima_count') }}
            </p>
            <p class="text-xs text-gray-500 mt-1">Total Transaksi</p>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <div class="overflow-x-auto">
            <table id="datatable" class="display min-w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Pengguna</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Email</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Poin</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Jasa</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Transaksi</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Bergabung</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($penggunas as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm flex-shrink-0">
                                        {{ strtoupper(substr($p->nama, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold text-gray-800">{{ $p->nama }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-500">{{ $p->email }}</td>
                            <td class="px-4 py-3 font-bold text-indigo-600">{{ number_format($p->poin) }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $p->jasa_count }}</td>
                            <td class="px-4 py-3 text-gray-600">
                                {{ $p->transaksi_sebagai_penyedia_count + $p->transaksi_sebagai_penerima_count }}
                            </td>
                            <td class="px-4 py-3 text-gray-400 text-xs">{{ $p->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <a href="{{ route('backoffice.pengguna.show', $p->id_pengguna) }}"
                                       class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                        Detail
                                    </a>
                                    <button type="button"
                                            onclick="openPoinModal('{{ $p->id_pengguna }}', '{{ addslashes($p->nama) }}', {{ $p->poin }})"
                                            class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                        Poin
                                    </button>
                                    <button type="button"
                                            onclick="confirmReset('{{ $p->id_pengguna }}', '{{ addslashes($p->nama) }}')"
                                            class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                        Reset PW
                                    </button>
                                    <button type="button"
                                            onclick="confirmDelete('{{ $p->id_pengguna }}', '{{ addslashes($p->nama) }}')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () { $('#datatable').DataTable(); });

    // Modal Update Poin
    function openPoinModal(id, nama, poinSekarang) {
        Swal.fire({
            title: 'Update Poin: ' + nama,
            html: `
                <p class="text-sm text-gray-500 mb-4">Saldo saat ini: <strong class="text-indigo-600">${poinSekarang} pts</strong></p>
                <div class="text-left mb-3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Aksi</label>
                    <select id="swal-aksi" class="w-full p-2 border border-gray-300 rounded-lg text-sm">
                        <option value="tambah">➕ Tambah Poin</option>
                        <option value="kurangi">➖ Kurangi Poin</option>
                    </select>
                </div>
                <div class="text-left">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Poin</label>
                    <input type="number" id="swal-jumlah" class="w-full p-2 border border-gray-300 rounded-lg text-sm"
                           placeholder="Masukkan jumlah" min="1" required>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const jumlah = document.getElementById('swal-jumlah').value;
                const aksi   = document.getElementById('swal-aksi').value;
                if (!jumlah || jumlah < 1) {
                    Swal.showValidationMessage('Masukkan jumlah poin yang valid');
                    return false;
                }
                
                document.getElementById('poin-aksi-' + id).value   = aksi;
                document.getElementById('poin-jumlah-' + id).value = jumlah;
                document.getElementById('poin-form-' + id).submit();
            }
        });
    }

    // Reset Password
    function confirmReset(id, nama) {
        Swal.fire({
            title: 'Reset Password ' + nama + '?',
            text: "Password akan diubah menjadi 'password123'",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f59e0b',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Reset!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('reset-form-' + id).submit();
            }
        });
    }

    // Hapus
    function confirmDelete(id, nama) {
        Swal.fire({
            title: 'Hapus ' + nama + '?',
            text: "Semua data pengguna ini akan terhapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
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