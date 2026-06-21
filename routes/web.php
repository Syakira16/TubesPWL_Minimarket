<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\ReportController;


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

    Route::resource('employess', EmployeeController::class);

    Route::get('/reports/sales',[ReportController::class,'sales'])->name('reports.sales');
    Route::get('/reports/stock',[ReportController::class,'stock'])->name('reports.stock');
});

Route::middleware(['auth', 'role:Cashier'])->group(function () {

    Route::get('/transactions',[TransactionController::class,'index'])->name('transactions.index');
    Route::get('/transactions/create',[TransactionController::class,'create'])
    ->name('transactions.create');

    Route::post('/transactions/add-cart',[TransactionController::class,'addToCart'])
    ->name('transactions.add-cart');

    Route::get('/transactions/remove-cart/{index}',[TransactionController::class,'removeCart'])
    ->name('transactions.remove-cart');

    Route::post('/transactions/store',[TransactionController::class,'store'])
    ->name('transactions.store');

    Route::get('/transactions/{id}',[TransactionController::class,'show'])
    ->name('transactions.show');
});


Route::middleware(['auth', 'role:Warehouse Staff'])->group(function () {

    Route::resource('stock-ins',StockInController::class);
    Route::resource('stock-outs',StockOutController::class);
});


require __DIR__.'/auth.php';
