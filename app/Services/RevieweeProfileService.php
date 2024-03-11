<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\RevieweeProfile;
use App\Interfaces\ProfileInterface;
use App\Http\Requests\BoarderRequest;

class RevieweeProfileService implements ProfileInterface
{
    public function store(BoarderRequest $request, Boarder $boarder)
    {
        $profile = RevieweeProfile::create($request->get('boarder')['profileable']);
        $profile->boarder()->save($boarder);
    }

    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $profile = RevieweeProfile::find($boarder->profile_id);
        $profile->update($request->get('boarder')['profileable']);
    }

    public function destroy(string $id)
    {
        //
    }
}