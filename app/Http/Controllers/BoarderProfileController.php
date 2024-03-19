<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoarderRequest;
use App\Interfaces\ProfileInterface;
use App\Models\Boarder;
use Illuminate\Http\Request;

class BoarderProfileController extends Controller
{
    public function createProfile(ProfileInterface $profile, Boarder $boarder, BoarderRequest $request)
    {
        $profile->store($request, $boarder);
    }

    public function updateProfile(ProfileInterface $profile, Boarder $boarder, BoarderRequest $request)
    {
        $profile->update($request, $boarder);
    }
}
