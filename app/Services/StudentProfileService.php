<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\StudentProfile;
use App\Interfaces\ProfileInterface;
use App\Http\Requests\BoarderRequest;

class StudentProfileService implements ProfileInterface
{
    public function store(BoarderRequest $request, Boarder $boarder)
    {
        $profile = StudentProfile::create($request->safe()->only(['schedule_type', 'vaccine', 'home_on_weekends']));
        $profile->boarder()->save($boarder);
    }

    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $profile = StudentProfile::findOrFail($boarder->profileable_id);
        $profile->update($request->safe()->only(['schedule_type', 'vaccine', 'home_on_weekends']));
    }

    public function destroy(string $id)
    {
        //
    }
}