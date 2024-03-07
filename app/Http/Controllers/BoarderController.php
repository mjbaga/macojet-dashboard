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

        return view('boarders.index', ['boarders' => Boarder::paginate(50)]);
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
        $file = $request->file('profile_picture');
        $path = $file->store('profile_pics', 'public');

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
    public function edit(Boarder $boarder)
    {
        return view('boarders.edit', compact('boarder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validated();

        if($request->file('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pics', 'private');

            $validatedData['profile_pic'] = $path;
        }

        $boarder->update($validatedData); 

        return redirect()->back()
            ->with('success', 'Successfully edited boarder!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
