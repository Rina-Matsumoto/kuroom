<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Time;
use App\Models\Classroom;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public function index(Day $day, Time $time, $classroom, Reserve $reserve)
    {
        // reservesテーブルからclassroom_idが$classroom(パラメータで渡されたclassroomのid)のものを取得する。
        $reserve_data = $reserve->where([["classroom_id", "=", $classroom]])->get();
        // dd($reserve_data);
        $tomorrow = Carbon::tomorrow();
        $max = Carbon::parse('+1 week');
        return view('user.reserve')->with(['days' => $day->get(), 'times' => $time->get(), 'classroom' => $classroom, 'tomorrow' => $tomorrow, 'max' => $max, 'reserve_datas' => $reserve_data]);  
    }
    
    public function show(ReserveRequest $request, $classroom , Day $day)
    {
        $input = $request->all();
        Auth::user();
        $a = Reserve::where([
            'reserve_date' => $input['reserve']['reserve_date'],
            'time_id' => $input['reserve']['time_id'],
            'admin_id' => Auth::user()->id,
            'classroom_id' => $input['reserve']['classroom_id'],
        ])->exists();
        
        if($a){
             return back()->with('flash_message', "既に予約が入っています");
        }else{
             // パラメータとしてclassroom、入力値のinput、daysテーブルのデータをinputで受け取った$input['reserve']['day_id']で絞ったデータをviewに渡す
            return view('user.confirm')->with(['classroom' => $classroom, 'input' => $input, 'days' => $day->where([
                ["id", "=", $input['reserve']['day_id']]
                ])->get()]);
            }
       
    }
    
    public function store(Request $request, $classroom, Reserve $reserve, Classroom $classroom_instans)
    {
        // classroomsテーブルのインスタンスからidが$classroomのデータを取得する
        $classroom_data = $classroom_instans->where([["id", "=", $classroom]])->first();
        // $requestにbackがあれば（修正するが押されれば）、入力値と共に入力画面にリダイレクトする。そうでなければ、保存する。
        if ($request->has('back')) {
            return redirect('/user/reserve/$classroom')->withInput($request->all());
        }else{
            // 認証しているユーザー情報（の中のadmin_id）を取得し、インスタンス化した$reserveのadmin_idカラムにいれる
            $user = Auth::user();
            $reserve->admin_id = $user->id;
            $reserve->user_id = $user->id;
            $reserve->classroom_id = $classroom;
            $reserve->classroom_name = $classroom_data->classroom_name;
            $form = $request['reserve'];
            $reserve->fill($form)->save();
            return view('user.complete');
        }
    }
    
    public function reserve(Reserve $reserve)
    {
       return view('admin.reservation')->with(['reserves' => $reserve->get()]);
    }
}