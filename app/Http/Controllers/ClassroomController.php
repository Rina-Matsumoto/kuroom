<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Day;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function index(Day $day, Time $time)
    {
        return view('admin.index')->with(['days' => $day->get(), 'times' => $time->get()]);  
    }
    
    public function show(Day $day, Time $time, Classroom $classroom)
    {
         $admin = Auth::user();
        // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        return view('admin.show')->with(['classrooms' => $classroom->where([
            ["day_id", "=", $day->id], ["time_id", "=", $time->id], ["admin_id", "=", $admin->id]
            ])->get(), 'days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function edit(Day $day, Time $time, Classroom $classroom)
    {
        // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        return view('admin.edit')->with(['classrooms' => $classroom->where([
            ["day_id", "=", $day->id], ["time_id", "=", $time->id], ["id", "=", $classroom->id]
            ])->get(), 'days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function update(Request $request, Classroom $classroom)
    {
        $input_classroom = $request['classroom'];
        $classroom->fill($input_classroom)->save();
    
        return redirect()->route('admin.show', ['day' => $classroom->day_id, 'time' => $classroom->time_id]); 
    }
    
    public function create(Day $day, Time $time)
    {
        return view('admin.create')->with(['days' => $day->get(), 'times' => $time->get()]);
    }
    
    public function store(Request $request, Classroom $classroom, Day $day, Time $time)
    {
        Auth::user();
        $classroom -> admin_id=Auth::user()->id;
        $input = $request['classroom'];
        $classroom->fill($input)->save();
        return back()->with('message', $classroom->classroom_name . 'を登録しました！');
    }
}