<?php

namespace App\Http\Controllers;

use App\Models\barangkeluar;
use App\Models\pelanggan;
use App\Models\stok;
use App\Models\suplier;
use Illuminate\Http\Request;

class dasboardController extends Controller
{
    public function index(){

        $getSuplier = suplier::count();
        $getPelanggan = pelanggan::count();
        $getStok = stok::count();
        $getPendapatan = barangkeluar::sum('sub_total');
        return view('Dashboard.dashboard', compact(
            'getSuplier',
            'getPelanggan',
            'getStok',
            'getPendapatan'
        ));
    }
}
