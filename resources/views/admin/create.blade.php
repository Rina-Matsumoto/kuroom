<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>教室追加</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h3 class="relative w-full text-2xl font-semibold">教室追加</h3>
        @if(session('message'))
            {{session('message')}}
        @endif
        <form action="/admin/create" method="POST">
            @csrf
            <div class="mb-3">
                　<label class="form-label">教室名</label>
                　<input type="text" class="form-control" name="classroom[classroom_name]" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label  class="form-label">予約最低人数</label>
                <select class="form-select" name="classroom[min_reserve_num]" aria-label="Default select example">
                  <option selected>人数</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
            </div>
            <div class="row">
              　<div class="col">
                    <select class="form-select" name="classroom[day_id]" aria-label="Default select example">
                        <option selected>曜日</option>
                         @foreach($days as $day)
                    　　　　<option value="{{$day->id}}" name="classroom[day_id]">{{$day->day}}</option>
                    　　 @endforeach
                    </select>
              　</div>
              　<div class="col">
                    <select class="form-select" name="classroom[time_id]" aria-label="Default select example">
                        <option selected>時間</option>
                        @foreach($times as $time)
                            <option value = "{{$time->id}}" name="classroom[time_id]">{{$time->time}}</option>
                        @endforeach
                    </select>
              　</div>
            </div>
            <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="submit">追加</button>
            </div>
        </form>
        <div class="footer">
           <a class="btn btn-primary mt-5" href="/admin/index">戻る</a>
        </div>
    </body>
</html>