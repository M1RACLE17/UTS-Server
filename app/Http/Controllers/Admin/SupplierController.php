<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('admin')->get();
        return view('admin.supplier', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'contact_info' => 'nullable|string|max:100',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => 1, 
        ]);

        return redirect()->route('suppliers')->with('success', 'Supplier added successfully');
    }
}