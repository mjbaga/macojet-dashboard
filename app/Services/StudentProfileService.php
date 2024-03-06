<?php


namespace App\Services;

use App\Interfaces\ProfileInterface;
use App\Models\Boarder;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentProfileService implements ProfileInterface
{
    public function store(Request $request, Boarder $boarder)
    {
        $profile = StudentProfile::create($request->get('boarder')['profileable']);
        $profile->boarder()->save($boarder);
    }

    public function update(Request $request, Boarder $boarder)
    {
        $profile = StudentProfile::find($boarder->profile_id);
        $profile->update($request->get('boarder')['profileable']);
    }

    public function destroy(string $id)
    {
        //
    }
}