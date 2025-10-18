@extends('layouts.app')

@section('content')
<div class="p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Produk</a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-800 rounded">
      {{ session('success') }}
    </div>
  @endif

  <table class="min-w-full bg-white border">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-2 text-left">Nama</th>
        <th class="px-4 py-2 text-left">Harga</th>
        <th class="px-4 py-2 text-left">Stok</th>
        <th class="px-4 py-2 text-left">Aksi</th>
      </tr>
    </thead>
    <div style="display:grid; grid-template-columns:repeat(6, 1fr); gap:32px; margin-top:32px;"> 
        @php
            $query = App\Models\Product::query();
            if(request('search')) $query->where('name', 'like', '%'.request('search').'%');
            if(request('category')) $query->where('category_id', request('category'));
            $products = $query->get();
        @endphp
        @foreach($products as $product)
            <a href="/products/{{ $product->id }}" style="background:white; border-radius:16px; box-shadow:0 4px 16px #0002; padding:22px; display:flex; flex-direction:column; align-items:center; border:1px solid #f3f4f6; text-decoration:none; cursor:pointer;">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/180' }}" alt="{{ $product->name }}" style="width:100%; height:140px; object-fit:cover; border-radius:8px; margin-bottom:12px;">
                <h3 style="margin:0 0 4px 0; font-size:1.1rem; font-weight:600; text-align:center; color:#2563eb;">{{ $product->name }}</h3>
                <p style="font-size:1rem; font-weight:500; color:#222; margin:0;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </a>
        @endforeach
    </div>
  </table>

  @if(method_exists($products,'links'))
    <div class="mt-4">{{ $products->links() }}</div>
  @endif
</div>
@endsection
