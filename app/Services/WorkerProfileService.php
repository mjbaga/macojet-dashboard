<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\WorkerProfile;
use Illuminate\Http\Request;
use App\Interfaces\ProfileInterface;

class WorkerProfileService implements ProfileInterface
{
    public function store(Request $request, Boarder $boarder)
    {
        $profile = WorkerProfile::create($request->get('boarder')['profileable']);
        $profile->boarder()->save($boarder);
    }

    public function update(Request $request, Boarder $boarder)
    {
        $profile = WorkerProfile::find($boarder->profile_id);
        $profile->update($request->get('boarder')['profileable']);
    }

    public function destroy(string $id)
    {
        //
    }
}