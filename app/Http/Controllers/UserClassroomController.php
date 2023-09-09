<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Day;
use App\Models\Time;
use App\Models\Subject;
use Illuminate\Http\Request;

class UserClassroomController extends Controller
{
    public function index(Day $day, Time $time)
    {
        return view('user.index')->with(['days' => $day->get(), 'times' => $time->get()]);  
    }
    
    public function timetable(Day $day, Time $time)
    {
        return view('user.timetable')->with(['days' => $day->get(), 'times' => $time->get()]);  
    }
    
    public function show(Day $day, Time $time, Classroom $classroom)
    {
        // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        return view('user.show')->with(['classrooms' => $classroom->where([
            ["day_id", "=", $day->id], ["time_id", "=", $time->id]
            ])->get(), 'days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function showtimetable(Day $day, Time $time, Subject $subject)
    {
        // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        return view('user.showtimetable')->with(['subjects' => $subject->where([
            ["day_id", "=", $day->id], ["time_id", "=", $time->id]
            ])->get(), 'days' => $day->get(), 'times' => $time->get()]);
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