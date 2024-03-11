<?php

namespace App\Interfaces;

use App\Models\Boarder;
use App\Http\Requests\BoarderRequest;

interface ProfileInterface {
    public function store(BoarderRequest $request, Boarder $boarder);
    public function update(BoarderRequest $request, Boarder $boarder);
    public function destroy(string $id);
}