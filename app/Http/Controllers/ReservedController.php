<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserved;

class ReservedController extends Controller
{
    public function index(Reserved $reserved)
    {
        return $reserved->get();
    }
}
