<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;
use App\Models\Unit;

class RoomController extends Controller
{

    public function index(Unit $unit)
    {
        $rooms = $unit->rooms()->get();

        return RoomResource::collection($rooms);
    }
}
