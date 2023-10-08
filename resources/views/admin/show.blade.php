<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>教室一覧</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    <body>
        <div class="content">
                <h3 class="relative w-full text-2xl font-semibold">教室一覧</h3>
                <script>
                    @if (session('flash_message'))
                        $(function () {
                                toastr.success('{{ session('flash_message') }}');
                        });
                    @endif
                </script>
                @foreach ($classrooms as $classroom)
                    <div class="flex flex-row space-x-8">
                        <div class="flex mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            <p>{{ $classroom->classroom_name }}</p>  
                        </div>
                    </div>
                    <form action="{{ route('admin.classroom.destroy', ['id'=>$classroom->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger mb-8">削除</button>
                    </form>
                @endforeach
        </div>
        <div class="footer">
            <button onclick="location.href='/admin/index'" class="flex mt-24 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
        </div>
    </body>
</html>