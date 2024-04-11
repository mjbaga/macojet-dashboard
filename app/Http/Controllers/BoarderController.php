<?php

namespace App\Http\Controllers;

use App\Models\Boarder;
use App\Http\Controllers\Traits\ImageSaveable;
use App\Http\Requests\BoarderRequest;
use App\Services\WorkerProfileService;
use App\Services\StudentProfileService;
use App\Services\RevieweeProfileService;
use App\Http\Controllers\BoarderProfileController;

class BoarderController extends Controller
{
    use ImageSaveable;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $validatedData = $request->validated();
        $saveData = $this->saveImage($request, $validatedData, 'profile_picture', 'profile_pic');

        Boarder::create($saveData); 

        return redirect()->route('boarders.index')
            ->with('success', 'Successfully added new boarder!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Boarder $boarder)
    {
        return view('boarders.show', ['boarder' => $boarder]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boarder $boarder)
    {
        return view('boarders.edit', ['boarder' => $boarder->load('profileable')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validated();
        $saveData = $this->saveImage($request, $validatedData, 'profile_picture', 'profile_pic');

        $boarder->update($saveData);

        $pc = new BoarderProfileController();
        $profile = $this->getProfileService($boarder);

        $boarder->profileable ?

            $pc->updateProfile( $profile, $boarder, $request ) :

            $pc->createProfile( $profile, $boarder, $request );


        return redirect()->back()
            ->with('success', 'Successfully updated boarder!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boarder $boarder)
    {
        $boarder->delete();

        return redirect()->back()->with('success', 'Successfully deleted boarder.');
    }

    public function getProfileService($boarder): WorkerProfileService|RevieweeProfileService|StudentProfileService
    {
        switch($boarder->profile_type) {
            case 'working':
                return new WorkerProfileService();
            case 'reviewee':
                return new RevieweeProfileService();
            default:
                return new StudentProfileService();
        }
    }
}
