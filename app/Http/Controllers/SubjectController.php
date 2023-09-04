<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Day;
use App\Models\Time;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create(Day $day, Time $time)
    {
        return view('user.create')->with(['days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function store(Request $request, Subject $subject, Day $day, Time $time)
    {
        $input = $request['subject'];
        $subject->fill($input)->save();
        return back()->with('message', $subject->subject_name . 'を登録しました！');
    }
}
