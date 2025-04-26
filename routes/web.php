<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\StockReportController;
use Illuminate\Support\Facades\Route;

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk items
Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

// Route untuk categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Route untuk suppliers
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');

// Route untuk laporan stok
Route::get('/stock/summary', [StockReportController::class, 'summary'])->name('stock.summary');
Route::get('/stock/low', [StockReportController::class, 'lowStock'])->name('stock.low');
Route::get('/stock/by-category', [StockReportController::class, 'byCategory'])->name('stock.by_category');
Route::get('/stock/per-category', [StockReportController::class, 'perCategory'])->name('stock.per_category');
Route::get('/stock/per-supplier', [StockReportController::class, 'perSupplier'])->name('stock.per_supplier');
Route::get('/stock/system-summary', [StockReportController::class, 'systemSummary'])->name('stock.system_summary');

// Redirect root ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});