<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Time;
use App\Models\Classroom;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function index(Day $day, Time $time, $classroom)
    {
        return view('user.reserve')->with(['days' => $day->get(), 'times' => $time->get(), 'classroom' => $classroom]);  
    }
    
    public function show(Request $request, $classroom)
    {
        $input = $request->all();
        return view('user.confirm')->with(['classroom' => $classroom, 'input' => $input]);
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