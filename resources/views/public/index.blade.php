<table id="datatable">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @for($i=0; $i<=10; $i++)
            <tr>
                <td>Judul {{ $i + 1 }}</td>
                <td>
                    <a href="{{ route('backoffice.pages.show', $i + 1) }}">Lihat</a>
                    <a href="{{ route('backoffice.pages.edit', $i + 1) }}">Edit</a>
                    <form id="delete-form-{{ $i }}" action="#" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $i }})">Hapus</button>
                    </form>
                </td>
            </tr>
        @endfor
    </tbody>
</table>