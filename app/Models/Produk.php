<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Mengubah nama tabel menjadi "produks"
    protected $fillable = ['nama', 'stok', 'harga', 'foto'];

    // Jika ingin menampilkan URL gambar
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('images/default.jpg');
    }
}