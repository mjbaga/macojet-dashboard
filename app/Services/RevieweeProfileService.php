<?php


namespace App\Services;

use App\Models\Boarder;
use App\Models\RevieweeProfile;
use App\Interfaces\ProfileInterface;
use App\Http\Requests\BoarderRequest;

class RevieweeProfileService implements ProfileInterface
{
    public $fields = [
        'review_center' => 'required|string|max:255',
        'review_center_address' => 'nullable'
    ];

    public function store(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validate($this->fields);

        $profile = RevieweeProfile::create($validatedData);
        $profile->boarder()->save($boarder);
    }

    public function update(BoarderRequest $request, Boarder $boarder)
    {
        $validatedData = $request->validate($this->fields);

        $profile = RevieweeProfile::find($boarder->profileable_id);
        $profile->update($validatedData);
    }

    public function destroy(string $id)
    {
        //
    }
}