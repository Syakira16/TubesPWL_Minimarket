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
        $totalCabang = Branch::count();
        $totalKategori = Category::count();
        $totalProduk = Product::count();
        $totalPegawai = Employee::count();
        $totalTransaksi = Transaction::count();

        $latestBranches = Branch::latest()->take(2)->get();
        $latestProducts = Product::latest()->take(2)->get();
        $latestCategory = Category::latest()->take(2)->get();
        $latestEmployee = Employee::latest()->take(2)->get();
        $latestTransaction = Transaction::latest()->take(2)->get();

        return view('dashboard', compact(
            'totalCabang',
            'totalKategori',
            'totalProduk',
            'totalPegawai',
            'totalTransaksi',
            'latestBranches',
            'latestProducts',
            'latestCategory',
            'latestEmployee',
            'latestTransaction',

        ));
    }
}
