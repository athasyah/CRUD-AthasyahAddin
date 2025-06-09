<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('customer')->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('sales.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_price' => 'required|numeric|min:0',
            'sold_at' => 'required|date',
            'status' => 'required|in:selesai,batal',
        ]);

        Sale::create($validated);

        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $customers = Customer::all();
        return view('sales.edit', compact('sale', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_price' => 'required|numeric|min:0',
            'sold_at' => 'required|date',
            'status' => 'required|in:selesai,batal',
        ]);

        $sale->update($validated);

        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
