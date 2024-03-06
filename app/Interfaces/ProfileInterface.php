<?php

namespace App\Interfaces;

use App\Models\Boarder;
use Illuminate\Http\Request;

interface ProfileInterface {
    public function store(Request $request, Boarder $boarder);
    public function update(Request $request, Boarder $boarder);
    public function destroy(string $id);
}