<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Day;
use App\Models\Time;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function index(Day $day, Time $time)
    {
        $days = $day->get();
        $times = $time->get();
        return view('admin.index', compact('days', 'times'));  
    }
    
    public function show(Day $day, Time $time, Classroom $classroom)
    {
         $admin = Auth::user();
         // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
         $classrooms = $classroom->where([["day_id", "=", $day->id], ["time_id", "=", $time->id], ["admin_id", "=", $admin->id]])->get();
         $days = $day->get();
         $times = $time->get();
        return view('admin.show', compact('classrooms', 'days', 'times'));
    }
    
    public function edit(Day $day, Time $time, Classroom $classroom)
    {
        // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        $classrooms = $classroom->where([["day_id", "=", $day->id], ["time_id", "=", $time->id], ["id", "=", $classroom->id]])->get();
        $days = $day->get();
        $times = $time->get();
        return view('admin.edit', compact('classrooms', 'days', 'times'));
    }
    
    public function update(Request $request, Classroom $classroom)
    {
        $input_classroom = $request['classroom'];
        $classroom->fill($input_classroom)->save();
    
        return redirect()->route('admin.show', ['day' => $classroom->day_id, 'time' => $classroom->time_id]); 
    }
    
    public function create(Day $day, Time $time)
    {
        $days = $day->get();
        $times = $time->get();
        return view('admin.create', compact('days', 'times'));
    }
    
    public function store(ClassroomRequest $request, Classroom $classroom, Day $day, Time $time)
    {
        Auth::user();
        $a = $classroom->where([
            'classroom_name' => $request['classroom']['classroom_name'],
            'day_id' => $request['classroom']['day_id'],
            'time_id' => $request['classroom']['time_id'],
            'admin_id' =>Auth::user()->id
        ])->exists();
        
        if($a){
             return back()->with('flash_message', "登録済みです");
        }else{
            Auth::user();
            $classroom -> admin_id=Auth::user()->id;
            $input = $request['classroom'];
            $classroom->fill($input)->save();
            return back()->with('flash_message', $classroom->classroom_name . 'を登録しました！');
        }
    }
    
     
    public function destroy($id)
    {
        $classroom = Classroom::find($id);
        $classroom->delete();
        return back()->with('flash_message', $classroom->classroom_name . 'を削除しました！');
    }
}