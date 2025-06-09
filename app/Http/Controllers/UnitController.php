<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        return view('unit.index', compact('units'));
    }
    public function create()
    {
        return view('unit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Unit::create($validated);
        return redirect()->route('unit.index')->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function show($id)
    {
    $units = Unit::findOrFail($id);
    return view('unit.show', compact('units'));
    }
    public function edit(Unit $unit)
    {

        return view('unit.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unit->update($validated);

        return redirect()->route('unit.index')->with('succes', 'Destinasi berhasil diperbarui');
    }

    public function destroy(Unit $unit)
    {

        $unit->delete();
        return redirect()->route('unit.index')->with('succes', "Destinasi berhasil dihapus");
    }

}
