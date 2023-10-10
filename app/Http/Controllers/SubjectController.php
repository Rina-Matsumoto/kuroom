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
        $days = $day->get();
        $times = $time->get();
        $subjects = $subject->where(['day_id', $day->id], ["time_id", $time->id])->get();
        return view('user.index.{day}.{time}', compact('subjects', 'days', 'times'));
    }
    
    public function create(Day $day, Time $time)
    {
        $days = $day->get();
        $times = $time->get();
        return view('user.create', compact('days', 'times'));
    }
    
    public function showsubject($day, $time, Subject $subject)
    {
        $user = Auth::user();
         // classroomsテーブルからパラメータとして渡された「day_id」と「time_id」を指定してデータを取得
        $subjects = $subject->where([['day_id', $day], ["time_id", $time], ["user_id", $user->id]])->get();
        return view('user.showsubject', compact('subjects'));
    }
    
    public function store(Request $request, Subject $subject, Day $day, Time $time)
    {
        if(empty($request['subject']['subject_name'])){
            return back()->with('message', "教科名を入力してください");
        }
        $user = Auth::user();
        $data = $subject->where([
            'subject_name' => $request['subject']['subject_name'],
            'day_id' => $request['subject']['day_id'],
            'time_id' => $request['subject']['time_id'],
            'user_id' => $user->id
        ])->exists();
        
        if($data){
             return back()->with('message', "登録済みです");
        }else{
            $subject -> user_id=$user->id;
            $input = $request['subject'];
            $subject->fill($input)->save();
            return back()->with('message', $subject->subject_name . 'を登録しました！');
        }
    }
    
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return back()->with('message', $subject->subject_name . 'を削除しました！');
    }
}
