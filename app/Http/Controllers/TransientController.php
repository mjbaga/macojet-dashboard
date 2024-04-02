<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Carbon\Traits\Units;
use App\Models\Transient;
use Illuminate\Http\Request;
use App\Http\Requests\TransientRequest;

class TransientController extends Controller
{
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
        $file = $request->file('identification');
        $path = $file->store('transient_ids', 'private');

        $validatedData = [
            ...$request->validated(),
            'id_card' => $path
        ];

        $transient = Transient::create($validatedData);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
