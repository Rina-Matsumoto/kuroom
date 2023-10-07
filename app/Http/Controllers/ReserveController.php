<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Time;
use App\Models\Classroom;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function index(Day $day, Time $time, $classroom)
    {
        return view('user.reserve')->with(['days' => $day->get(), 'times' => $time->get(), 'classroom' => $classroom]);  
    }
    
    public function show(ReserveRequest $request, $classroom , Day $day)
    {
        $input = $request->all();
        // パラメータとしてclassroom、入力値のinput、daysテーブルのデータをinputで受け取った$input['reserve']['day_id']で絞ったデータをviewに渡す
        return view('user.confirm')->with(['classroom' => $classroom, 'input' => $input, 'days' => $day->where([
            ["id", "=", $input['reserve']['day_id']]
            ])->get()]);
    }
    
    public function store(Request $request, $classroom, Reserve $reserve)
    {
        // $requestにbackがあれば（修正するが押されれば）、入力値と共に入力画面にリダイレクトする。そうでなければ、保存する。
        if ($request->has('back')) {
            return redirect('/user/reserve/$classroom')->withInput($request->all());
        }else{
            // 認証しているユーザー情報（の中のadmin_id）を取得し、インスタンス化した$reserveのadmin_idカラムにいれる
            $user = Auth::user();
            $reserve->admin_id = $user->id;
            $form = $request['reserve'];
            $reserve->fill($form)->save();
            return view('user.complete');
        }
    }
}