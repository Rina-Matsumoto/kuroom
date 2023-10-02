<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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
    
    public function index(Request $request, Comment $comment, Classroom $classroom)
    {
        if($request->session()->missing('user_identifier')){ session(['user_identifier' => Str::random(20)]); }
       
        return view('user.comment')->with(['comments' => $comment->where("classroom_id", "=", $classroom->id)->get(), 'classrooms' => $classroom->get(), 'user_identifier']);
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request, Classroom $classroom)
    {
         session(['users_identifier' => $request->user_identifier]);
         $comment = new Comment();
         $comment->classroom_id = $classroom->id;
         $form = $request->all();
         $comment->fill($form)->save();
         return redirect('/user/comment/' . $classroom->id);
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // public function getData(Request $request, Classroom $classroom)
    // {
    //     $result = $request->classroom_id;
    //     $comments = Comment::orderBy('created_at', 'desc')->where("classroom_id", "=", $result)->get();
    //     $json = ["comments" => $comments];
    //     return response()->json($json);
    // }
}
