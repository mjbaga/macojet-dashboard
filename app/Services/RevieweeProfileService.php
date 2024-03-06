<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\RevieweeProfile;
use Illuminate\Http\Request;
use App\Interfaces\ProfileInterface;

class RevieweeProfileService implements ProfileInterface
{
    public function store(Request $request, Boarder $boarder)
    {
        $profile = RevieweeProfile::create($request->get('boarder')['profileable']);
        $profile->boarder()->save($boarder);
    }

    public function update(Request $request, Boarder $boarder)
    {
        $profile = RevieweeProfile::find($boarder->profile_id);
        $profile->update($request->get('boarder')['profileable']);
    }

    public function destroy(string $id)
    {
        //
    }
}