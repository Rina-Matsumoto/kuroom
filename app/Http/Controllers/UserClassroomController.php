<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Day;
use App\Models\Time;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserClassroomController extends Controller
{
    public function index(Day $day, Time $time, Subject $subject)
    {
        $days = $day->get();
        // dd($days);
        $times = $time->get();
        $subjects = $subject->get();
        // dd($subjects);
        return view('user.index', compact('days', 'times', 'subjects'));
    }
    
    public function timetable(Day $day, Time $time, Subject $subject)
    {
        $user = Auth::user();
        $days = $day->get();
        $times = $time->get();
        $subjects = $subject->get();
        return view('user.timetable', compact('days', 'times', 'subjects'));
        
        
        
        
    
        
        
    }
    
    public function show($day, $time, Classroom $classroom)
    {
        $admin = Auth::user();
        // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        $classrooms = $classroom->where([["day_id", $day], ["time_id", $time], ["admin_id", $admin->admin_id]])->get();
        return view('user.show', compact('classrooms'));
    }
    
    /**public function create(Day $day, Time $time)
    {
        return view('user.create')->with(['days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function store(Request $request, Classroom $classroom, Day $day, Time $time)
    {
        $input = $request['classroom'];
        $classroom->fill($input)->save();
        return back()->with('message', $classroom->classroom_name . 'を登録しました！');
    }
    **/
}