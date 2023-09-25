<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>教室一覧</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <div id="classrooms">
                <h3 class="relative w-full text-2xl font-semibold">教室一覧</h3>
                    @foreach ($classrooms as $classroom)
                    <div class="flex flex-row space-x-8">
                        <div class="flex mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            <a href="/user/comment/{{$classroom->id}}"><p>{{ $classroom->classroom_name }}</p></a>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        <div class="footer">
            <button onclick="location.href='/user/index'" class="flex mt-24 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
        </div>
    </body>
</html>