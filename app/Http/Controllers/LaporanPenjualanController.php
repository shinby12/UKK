<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Carbon\Carbon;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('pelanggan', 'detailPenjualan.produk')->latest()->get();
        return view('laporan.penjualan', compact('penjualan'));
    }

    public function filter(Request $request)
    {
        $start = Carbon::parse($request->start_date)->startOfDay();
        $end = Carbon::parse($request->end_date)->endOfDay();

        $penjualan = Penjualan::whereBetween('created_at', [$start, $end])->with('pelanggan', 'detailPenjualan.produk')->get();
        
        return view('laporan.penjualan', compact('penjualan'));
    }
}
