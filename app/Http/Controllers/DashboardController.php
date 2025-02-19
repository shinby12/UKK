<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $produkCount = Produk::count();
        $pelangganCount = Pelanggan::count();
        $penjualanCount = Penjualan::count();

        return view('dashboard', compact('produkCount', 'pelangganCount', 'penjualanCount'));
    }
}

