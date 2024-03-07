<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoarderRequest;
use App\Models\Boarder;
use Illuminate\Http\Request;

class BoarderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Boarder::paginate(10));

        return view('boarders.index', ['boarders' => Boarder::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boarders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoarderRequest $request)
    {
        // $this->authorize('create', Boarder::class);
        

        $file = $request->file('profile_picture');
        $path = $file->store('profile_pics', 'private');

        $validatedData = [
            ...$request->validated(),
            'profile_pic' => $path
        ];

        Boarder::create($validatedData); 

        return redirect()->route('boarders.index')
            ->with('success', 'Successfully added new boarder!');
        
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
