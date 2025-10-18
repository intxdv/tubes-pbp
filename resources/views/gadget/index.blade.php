<!DOCTYPE html>
<html>
<head>
    <title>Daftar Gadget</title>
</head>
<body>
    <h1>Daftar Gadget</h1>
    <a href="{{ route('gadgets.create') }}">Tambah Gadget Baru</a>
    <br><br>
    @if ($message = Session::get('success'))
        <p style="color: green">{{ $message }}</p>
    @endif
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        @foreach ($gadgets as $g)
        <tr>
            <td>{{ $g->id }}</td>
            <td>{{ $g->nama }}</td>
            <td>{{ $g->harga }}</td>
            <td>{{ $g->kategori }}</td>
            <td>
                <a href="{{ route('gadgets.edit', $g->id) }}">Edit</a> |
                <form action="{{ route('gadgets.destroy', $g->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
