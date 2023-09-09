<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Comment $comment, Classroom $classroom)
    {
        return view('user.comment')->with(['comments' => $comment->where("classroom_id", "=", $classroom->id)->get()]);
    }
    
    public function add(Request $request, Classroom $classroom)
    {
        
        
        
        $input = $request['comment'];
        $commnet->fill($input)->save();
        return redirect()->route('comment');
        
        
       
    }
}
