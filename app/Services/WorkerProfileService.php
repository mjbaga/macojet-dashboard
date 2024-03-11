<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\WorkerProfile;
use App\Interfaces\ProfileInterface;
use App\Http\Requests\BoarderRequest;

class WorkerProfileService implements ProfileInterface
{
    public $fields = [
        'company' => 'required|string|max:255',
        'company_address' => 'nullable|string',
        'position' => 'nullable|string|max:255',
        'schedule_type' => 'nullable|string|max:255'
    ];
    public function store(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validate($this->fields);

        $profile = WorkerProfile::create($validatedData);
        $profile->boarder()->save($boarder);
    }

    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validate($this->fields);

        $profile = WorkerProfile::find($boarder->profileable_id);
        $profile->update($validatedData);
    }
}