<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Owner'])->group(function () {
    Route::resource('branches', BranchController::class);
    Route::resource('categories', CategoryController::class);

    

   Route::resource('products', ProductController::class);

    Route::resource('employees', EmployeeController::class);
});

Route::middleware(['auth', 'role:Cashier'])->group(function () {
    Route::get('/transactions', function () {
        return "Halaman Transaksi";
    });
});

Route::middleware(['auth', 'role:Warehouse Staff'])->group(function () {

    Route::get('/stock-in', function () {
        return "Barang Masuk";
    });

    Route::get('/stock-out', function () {
        return "Barang Keluar";
    });
});

require __DIR__.'/auth.php';
