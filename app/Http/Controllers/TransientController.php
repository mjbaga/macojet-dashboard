<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Controllers\Traits\ImageSaveable;
use App\Models\Transient;
use App\Http\Requests\TransientRequest;

class TransientController extends Controller
{
    use ImageSaveable;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transients.index', ['transients' => Transient::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransientRequest $request)
    {
        $validatedData = $request->validated();
        $saveData = $this->saveImage($request, $validatedData, 'identification', 'id_card');

        $transient = Transient::create($saveData);

        return redirect()->route('transients.show', $transient)
            ->with('success', 'Successfully added new transi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transient $transient)
    {
        $transientUnits = Unit::unitType('transient')->get();
        
        return view('transients.show', ['transient' => $transient, 'units' => $transientUnits]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transient $transient)
    {
        return view('transients.edit', ['transient' => $transient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransientRequest $request, Transient $transient)
    {
        $validatedData = $request->validated();
        $saveData = $this->saveImage($request, $validatedData, 'identification', 'id_card');

        $transient->update($saveData);

        return redirect()->route('transients.show', $transient)
            ->with('success', 'Successfully updated transient!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transient $transient)
    {
        $transient->delete();

        return redirect()->route('transients.index')
            ->with('success', 'Successfully deleted transient!');
    }
}
