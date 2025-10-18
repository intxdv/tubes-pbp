<!DOCTYPE html>
<html>
<head>
    <title>Edit Gadget</title>
</head>
<body>
    <h1>Edit Gadget</h1>

    <form action="{{ route('gadgets.update', $gadget->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $gadget->nama }}"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $gadget->harga }}"><br><br>

        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="{{ $gadget->kategori }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('gadgets.index') }}">Kembali</a>
</body>
</html>
