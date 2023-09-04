<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>教室追加</title>
    </head>
    <body>
        <h1>教室追加</h1>
        @if(session('message'))
            {{session('message')}}
        @endif
        <form action="/admin/create" method="POST">
            @csrf
            <div class="title">
                <input type="text" name="classroom[classroom_name]" placeholder="教室名"/>
                <br>
            </div>
            <select name="classroom[day_id]">
                @foreach($days as $day)
                <option value="{{$day->id}}">{{$day->day}}</option>
                @endforeach
            </select>
            <select name="classroom[time_id]">
                @foreach($times as $time)
                <option value = "{{$time->id}}" name="classroom[time_id]">{{$time->time}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="追加"/>
        </form>
        <div class="footer">
            <a href="/admin/index">戻る</a>
        </div>
    </body>
</html>