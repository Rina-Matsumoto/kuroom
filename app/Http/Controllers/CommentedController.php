<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commented;

class CommentedController extends Controller
{
    public function index(Commented $commented)
    {
        return $commented->get();
    }
}
