<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Transaction;

class DashboardController extends Controller
{
    
    public function index()
    {
        $branches = Branch::all();
        $totalCabang = Branch::count();
        $totalKategori = Category::count();
        $totalProduk = Product::count();
        $totalPegawai = Employee::count();
        $totalTransaksi = Transaction::count();

        return view('dashboard', compact(
            'totalCabang',
            'totalKategori',
            'totalProduk',
            'totalPegawai',
            'totalTransaksi',
            'branches'
        ));
        
    }
}
