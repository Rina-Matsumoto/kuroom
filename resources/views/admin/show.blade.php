<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>教室一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="content">
                <h3>教室一覧</h3>
                @foreach ($classrooms as $classroom)
                    <p>{{ $classroom->classroom_name }}</p>    
                @endforeach
        </div>
        <div class="footer">
            <a href="/admin/index">戻る</a>
        </div>
        <body>
    <!--- ここからテスト用 --->
    <button type="button" class="cursor-pointer m-5 p-3 shadow-md rounded-md font-semibold text-white text-base bg-blue-500 hover:bg-blue-700 ring-blue-200 ring-2">
      テスト
    </button>
    <!--- ここまでテスト用 --->
</body>
    </body>
</html>