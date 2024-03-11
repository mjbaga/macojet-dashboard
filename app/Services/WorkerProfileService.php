<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\WorkerProfile;
use App\Interfaces\ProfileInterface;
use App\Http\Requests\BoarderRequest;

class WorkerProfileService implements ProfileInterface
{
    public function store(BoarderRequest $request, Boarder $boarder)
    {
        $profile = WorkerProfile::create($request->get('boarder')['profileable']);
        $profile->boarder()->save($boarder);
    }

    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $profile = WorkerProfile::find($boarder->profile_id);
        $profile->update($request->get('boarder')['profileable']);
    }

    public function destroy(string $id)
    {
        //
    }
}