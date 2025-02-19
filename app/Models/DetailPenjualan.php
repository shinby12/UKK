<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = ['penjualan_id', 'produk_id', 'jumlah', 'harga_satuan', 'subtotal'];

    // Relasi ke tabel Penjualan (many-to-one)
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    // Relasi ke tabel Produk (many-to-one)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    public function detailPenjualans()
{
    return $this->hasMany(DetailPenjualan::class, 'produk_id');
}

}
