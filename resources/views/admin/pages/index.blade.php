<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin - Manajemen Halaman</title>
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
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Halaman</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola konten halaman publik platform</p>
        </div>
        <a href="{{ route('backoffice.pages.create') }}"
           class="primary-gradient text-white px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 hover:opacity-90 transition">
            + Tambah Halaman
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <div class="overflow-x-auto">
            <table id="datatable" class="display min-w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Judul</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Slug</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Dibuat</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($pages as $page)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $page->title }}</td>
                            <td class="px-4 py-3 text-gray-400 text-xs font-mono">{{ $page->slug }}</td>
                            <td class="px-4 py-3 text-gray-400 text-xs">{{ $page->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('backoffice.pages.show', $page->id) }}"
                                       class="bg-sky-500 hover:bg-sky-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                        Lihat
                                    </a>
                                    <a href="{{ route('backoffice.pages.edit', $page->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                        Edit
                                    </a>
                                    <form id="delete-form-{{ $page->id }}"
                                          action="{{ route('backoffice.pages.destroy', $page->id) }}"
                                          method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                onclick="confirmDelete('{{ $page->id }}', '{{ addslashes($page->title) }}')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                                            Hapus
                                        </button>
                                    </form>
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

    function confirmDelete(id, judul) {
        Swal.fire({
            title: 'Hapus "' + judul + '"?',
            text: "Halaman akan dihapus permanen!",
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