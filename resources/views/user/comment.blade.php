<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ステータス</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <h1 class="my-4 text-3xl font-bold">{{env('APP_NAME')}}</h1>
            <ul>
                
                    @foreach ($comments as $comment)
                        <p class="text-xs @if($comment->user_identifier === session('user_identifier')) text-right @endif">{{$comment->created_at}}</p>
                        <li class="w-max mb-3 p-2 rounded-lg bg-blue-200 relative @if($comment->user_identifier === session('user_identifier')) self ml-auto @else other @endif">
                            <div class="p-2 rounded-lg bg-blue-200">
                                {{$comment->comment}}
                            </div>
                        </li>
                    @endforeach
            </ul>
        </div>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="" method="POST">
            @csrf
            <input type="hidden" name="user_identifier" value={{session('user_identifier')}}>
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto" type="text" name="comment" placeholder="Input comment." maxlength="200" required>
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
        </form>
    </body>
</html>