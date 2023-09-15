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
        return view('user.comment')->with(['comments' => $comment->where("classroom_id", "=", $classroom->id)->get(), 'classrooms' => $classroom->get()]);
    }
    
    public function store(Request $request, Classroom $classroom)
    {
         $input = $request->only('user_id', 'comment');
         $comment = new Comment();
         $comment->user_id = Auth::id();
         $comment->classroom_id = $classroom->id;
         $comment->comment = $input["comment"];
         $comment->save();
         return redirect('/user/comment/' . $classroom->id)->with(['classrooms' => $classroom->get()]);
    }
    
    public function getData(Request $request, Classroom $classroom)
    {
        $result = $request->classroom_id;
        $comments = Comment::orderBy('created_at', 'desc')->where("classroom_id", "=", $result)->get();
        $json = ["comments" => $comments];
        return response()->json($json);
    }
}
