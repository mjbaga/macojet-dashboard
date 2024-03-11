<?php

namespace App\Http\Controllers;

use App\Interfaces\ProfileInterface;
use App\Models\Boarder;
use Illuminate\Http\Request;

class BoarderProfileController extends Controller
{
    public function createProfile(ProfileInterface $profile, Boarder $boarder, Request $request)
    {
        $profile->store($request, $boarder);
    }

    public function updateProfile(ProfileInterface $profile, Boarder $boarder, Request $request)
    {
        $profile->update($request, $boarder);
    }

    public function deleteProfile(ProfileInterface $profile, string $id)
    {
        $profile->destroy($id);
    }
}
