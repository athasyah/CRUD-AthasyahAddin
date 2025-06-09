<?php

namespace App\Http\Controllers;

use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\Medicine;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    public function index()
    {
        $saleItems = SaleItem::with(['sale', 'medicine'])->get();
        return view('sale_items.index', compact('saleItems'));
    }

    public function create()
    {
        $sales = Sale::all();
        $medicines = Medicine::all();
        return view('sale_items.create', compact('sales', 'medicines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
        ]);

        SaleItem::create($validated);
        return redirect()->route('sale_items.index')->with('success', 'Item penjualan berhasil ditambahkan');
    }

    public function edit(SaleItem $sale_item)
    {
        $sales = Sale::all();
        $medicines = Medicine::all();
        return view('sale_items.edit', compact('sale_item', 'sales', 'medicines'));
    }

    public function update(Request $request, SaleItem $sale_item)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'medicine_id' => 'required|exists:medicines,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $sale_item->update($validated);
        return redirect()->route('sale_items.index')->with('success', 'Item penjualan berhasil diperbarui');
    }

    public function destroy(SaleItem $sale_item)
    {
        $sale_item->delete();
        return redirect()->route('sale_items.index')->with('success', 'Item penjualan berhasil dihapus');
    }
}
