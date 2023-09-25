<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Day;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index(Day $day, Time $time, Subject $subject)
    {
        return view('user.index.{day}.{time}')->with(['subjects' => $subject->where([
            ["day_id", "=", $day->id], ["time_id", "=", $time->id]
            ])->get(), 'days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function create(Day $day, Time $time)
    {
        return view('user.create')->with(['days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function store(Request $request, Subject $subject, Day $day, Time $time)
    {
        if(empty($request['subject']['subject_name'])){
            return back()->with('message', "教科名を入力してください");
        }
        Auth::user();
        $data = Subject::where([
            'subject_name' => $request['subject']['subject_name'],
            'day_id' => $request['subject']['day_id'],
            'time_id' => $request['subject']['time_id'],
            'user_id' => Auth::user()->id
        ])->exists();
        
        if($data){
             return back()->with('message', "登録済みです");
        }else{
            Auth::user();
            $subject -> user_id=Auth::user()->id;
            $input = $request['subject'];
            $subject->fill($input)->save();
            return back()->with('message', $subject->subject_name . 'を登録しました！');
        }
    }
}
