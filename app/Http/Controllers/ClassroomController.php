<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index(Classroom $classroom)
    {
        return $classroom->get();
    }
}
