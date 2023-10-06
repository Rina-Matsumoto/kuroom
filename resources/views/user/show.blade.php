<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>教室一覧</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                        <div class="flex mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            <a href="/user/reserve/{{$classroom->id}}">予約する</a>
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