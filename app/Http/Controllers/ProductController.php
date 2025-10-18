<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    // Jika ingin proteksi (hanya admin), tambahkan middleware pada constructor.
    // public function __construct() { $this->middleware('auth'); }

    public function index()
    {
        // Ambil semua produk (untuk produksi pakai paginate)
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Tampilkan form tambah produk
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Tangani upload gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Simpan produk
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        // (opsional) tampilkan detail produk
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        // Tampilkan form edit
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi input (mirip store)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada gambar baru, hapus gambar lama lalu simpan gambar baru
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Update produk
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar kalau ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Hapus record produk
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }


    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products.index', compact('products'));
    // }

    // public function create()
    // {
    //     return view('products.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'price' => 'required|numeric|min:0',
    //         'stock' => 'required|integer|min:0',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    //     ]);

    //     $data = $request->all();

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('products', 'public');
    //     }

    //     Product::create($data);
    //     return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    // }

    // public function edit(Product $product)
    // {
    //     return view('products.edit', compact('product'));
    // }

    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'price' => 'required|numeric|min:0',
    //         'stock' => 'required|integer|min:0',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    //     ]);

    //     $data = $request->all();

    //     if ($request->hasFile('image')) {
    //         if ($product->image) {
    //             Storage::disk('public')->delete($product->image);
    //         }
    //         $data['image'] = $request->file('image')->store('products', 'public');
    //     }

    //     $product->update($data);
    //     return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    // }

    // public function destroy(Product $product)
    // {
    //     if ($product->image) {
    //         Storage::disk('public')->delete($product->image);
    //     }
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    // }
}
