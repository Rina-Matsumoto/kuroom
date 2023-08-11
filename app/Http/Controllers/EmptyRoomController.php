<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmptyRoom;

class EmptyRoomController extends Controller
{
    public function index(EmptyRoom $empty_room)
    {
        return $empty_room->get();
    }
}
