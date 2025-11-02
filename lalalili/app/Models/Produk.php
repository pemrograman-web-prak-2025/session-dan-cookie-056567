<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Produk extends Model 
{
    // Nama tabel di database
    protected $table = "produk";

    protected $fillable = [
        'nama_produk',
        'stok',
        'harga',
    ];
}
