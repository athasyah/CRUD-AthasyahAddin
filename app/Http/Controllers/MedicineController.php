<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Unit;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load medicines beserta relasi unit-nya
        $medicines = Medicine::with('unit')->get();
        $units = Unit::all();
        return view('medicines.index', compact('medicines', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('medicines.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'expired_at' => 'nullable|date',
        ]);

        Medicine::create($validated);

        return redirect()->route('medicines.index')->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        $units = Unit::all();
        return view('medicines.edit', compact('medicine', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'expired_at' => 'nullable|date',
        ]);

        $medicine->update($validated);

        return redirect()->route('medicines.index')->with('success', 'Obat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index')->with('success', 'Obat berhasil dihapus');
    }
}
