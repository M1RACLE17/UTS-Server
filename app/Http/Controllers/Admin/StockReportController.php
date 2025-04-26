<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    // Ringkasan Stok Barang (sebelumnya)
    public function summary()
    {
        $items = Item::all();
        $totalStock = $items->sum('quantity');
        $totalValue = $items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $averagePrice = $items->avg('price');

        return view('admin.stock_summary', compact('totalStock', 'totalValue', 'averagePrice'));
    }

    // Barang dengan Stok Rendah (sebelumnya)
    public function lowStock()
    {
        $lowStockItems = Item::with(['category', 'supplier', 'admin'])
            ->where('quantity', '<', 5)
            ->get();

        return view('admin.low_stock', compact('lowStockItems'));
    }

    // Laporan Barang Berdasarkan Kategori (sebelumnya)
    public function byCategory(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->input('category_id');
        
        $items = Item::with(['category', 'supplier', 'admin'])
            ->when($selectedCategory, function ($query, $selectedCategory) {
                return $query->where('category_id', $selectedCategory);
            })
            ->get();

        return view('admin.by_category', compact('items', 'categories', 'selectedCategory'));
    }

    // Ringkasan Per Kategori
    public function perCategory()
    {
        $categories = Category::with('items')->get();

        $categorySummaries = $categories->map(function ($category) {
            $items = $category->items;
            return [
                'name' => $category->name,
                'item_count' => $items->count(),
                'total_value' => $items->sum(function ($item) {
                    return $item->quantity * $item->price;
                }),
                'average_price' => $items->avg('price') ?? 0,
            ];
        });

        return view('admin.per_category', compact('categorySummaries'));
    }

    // Ringkasan Per Pemasok
    public function perSupplier()
    {
        $suppliers = Supplier::with('items')->get();

        $supplierSummaries = $suppliers->map(function ($supplier) {
            $items = $supplier->items;
            return [
                'name' => $supplier->name,
                'item_count' => $items->count(),
                'total_value' => $items->sum(function ($item) {
                    return $item->quantity * $item->price;
                }),
            ];
        });

        return view('admin.per_supplier', compact('supplierSummaries'));
    }

    // Ringkasan Sistem Keseluruhan
    public function systemSummary()
    {
        $totalItems = Item::count();
        $totalStockValue = Item::all()->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();

        return view('admin.system_summary', compact('totalItems', 'totalStockValue', 'totalCategories', 'totalSuppliers'));
    }
}