<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Unit $unit)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|string|max:255',
            'capacity' => 'integer|max:30'
        ]);

        $unit->rooms()->create($validatedData);

        return redirect()->route('units.edit', $unit)->with('success', 'Successfully added room.');
    }
}
