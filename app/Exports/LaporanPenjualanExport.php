<?php
namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanPenjualanExport implements FromCollection
{
    public function collection()
    {
        return Penjualan::all();
    }
}
