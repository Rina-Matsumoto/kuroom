<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>授業追加</title>
    </head>
    <body>
        <h3>授業追加</h3>
        @if(session('message'))
            {{session('message')}}
        @endif
        <form action="/user/create" method="POST">
            @csrf
            <div class="title">
                <input type="text" name="subject[subject_name]" placeholder="授業名"/>
                <br>
            </div>
            <select name="subject[day_id]">
                @foreach($days as $day)
                <option value="{{$day->id}}">{{$day->day}}</option>
                @endforeach
            </select>
            <select name="subject[time_id]">
                @foreach($times as $time)
                <option value = "{{$time->id}}">{{$time->time}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="追加"/>
        </form>
        <div class="footer">
            <a href="/user/index">戻る</a>
        </div>
    </body>
</html>







