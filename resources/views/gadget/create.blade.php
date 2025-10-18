<!DOCTYPE html>
<html>
<head>
    <title>Tambah Gadget</title>
</head>
<body>
    <h1>Tambah Gadget Baru</h1>

    <form action="{{ route('gadgets.store') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga"><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori"><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('gadgets.index') }}">Kembali</a>
</body>
</html>
