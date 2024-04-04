<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NotesRequest;

class NotesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(NotesRequest $request)
    {
        Note::create($request->validated());

        return redirect()->back()->with('success', 'Note added!');
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
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->back()->with('success', 'Note deleted!');
    }
}
