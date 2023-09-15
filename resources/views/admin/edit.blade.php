<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>教室編集</title>
    </head>
    <body>
        <h1>教室編集</h1>
        @if(session('message'))
            {{session('message')}}
        @endif
        @foreach($classrooms as $classroom)@endforeach
        <form action="/admin/update/{{ $classroom->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                @foreach($classrooms as $classroom)
                <input type="text" name="classroom[classroom_name]" value="{{ $classroom->classroom_name}}" placeholder="教室名"/>
                <br>
                @endforeach
                <br>
            </div>
            <br>
            <input type="submit" value="更新する"/>
        </form>
        <div class="footer">
            <a href="/admin/index">戻る</a>
        </div>
    </body>
</html>