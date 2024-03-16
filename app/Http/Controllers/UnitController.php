<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('units.index', ['units' => Unit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Unit::create($request->validate([
            'unit_name' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255'
        ]));

        return redirect()->route('units.index')
            ->with('success', 'Successfully added new unit!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $validatedData = $request->validate([
            'unit_name' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255'
        ]);

        $unit->update($validatedData);

        return redirect()->back()->with('success', 'Successfully update unit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->back()->with('success', 'Successfully deleted unit.');
    }
}
