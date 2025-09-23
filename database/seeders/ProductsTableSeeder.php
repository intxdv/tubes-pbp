<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Produk 1',
            'description' => 'Deskripsi produk 1',
            'price' => 100000,
            'stock' => 10,
            'image' => 'product1.jpg',
        ]);

        Product::create([
            'name' => 'Produk 2',
            'description' => 'Deskripsi produk 2',
            'price' => 200000,
            'stock' => 5,
            'image' => 'product2.jpg',
        ]);

        Product::create([
            'name' => 'Produk 3',
            'description' => 'Deskripsi produk 3',
            'price' => 150000,
            'stock' => 7,
            'image' => 'product3.jpg',
        ]);
    }
}
