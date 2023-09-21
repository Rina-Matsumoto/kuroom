<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>教室一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <div id="classrooms">
                <h3>教室一覧</h3>
                @foreach ($classrooms as $classroom)
                    <a href="/user/comment/{{$classroom->id}}"><p>{{ $classroom->classroom_name }}</p></a>
                @endforeach
            </div>
        </div>
        <div class="footer">
            <a href="/user/index">戻る</a>
        </div>
    </body>
</html>