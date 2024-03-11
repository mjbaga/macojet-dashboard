<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\StudentProfile;
use App\Interfaces\ProfileInterface;
use App\Http\Requests\BoarderRequest;

class StudentProfileService implements ProfileInterface
{
    public $fields = [
        'schedule_type' => 'required|string|max:255',
        'vaccine' => 'required|string|max:255',
        'home_on_weekends' => 'required|boolean'
    ];

    public function store(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validate($this->fields);

        $profile = StudentProfile::create($validatedData);
        $profile->boarder()->save($boarder);
    }

    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validate($this->fields);

        $profile = StudentProfile::find($boarder->profileable_id);
        $profile->update($validatedData);
    }
}