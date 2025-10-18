@extends('layouts.app')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

  @if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
      <ul class="list-disc ml-6">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
      <label class="block font-medium">Nama Produk</label>
      <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2">
    </div>

    <div>
      <label class="block font-medium">Harga</label>
      <input type="number" name="price" value="{{ old('price') }}" class="border rounded w-full p-2">
    </div>

    <div>
      <label class="block font-medium">Stok</label>
      <input type="number" name="stock" value="{{ old('stock') }}" class="border rounded w-full p-2">
    </div>

    <div>
      <label class="block font-medium">Deskripsi</label>
      <textarea name="description" rows="4" class="border rounded w-full p-2">{{ old('description') }}</textarea>
    </div>

    <div>
      <label class="block font-medium">Gambar Produk</label>
      <input type="file" name="image" class="border rounded w-full p-2">
    </div>

    <div class="flex justify-between">
      <a href="{{ route('products.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Kembali</a>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>
</div>
@endsection
