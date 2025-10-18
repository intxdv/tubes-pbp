<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;

    // Kolom yang boleh diisi melalui mass-assignment (Product::create($data))
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    // Memaksa tipe data / format ketika mengambil dari DB
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];
}
