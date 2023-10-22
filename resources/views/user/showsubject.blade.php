<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>時間割</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h3 class="relative w-full text-2xl font-semibold">時間割</h3>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            @if(session('message'))
                {{session('message')}}
            @endif
            <div class="p-2">
                <div class="content">
                    <div id="subjects">
                        @foreach ($subjects as $subject)
                            <div class="card mt-4 mb-4 mr-4 ml-2 float-left" style="width: 18rem;">
                              <div class="card-body">
                                <div class="flex mt-10 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                    <p>{{ $subject->subject_name }}</p>
                                </div>
                                <form action="{{ route('user.subject.destroy', ['id'=>$subject->id]) }}" method="POST">
                                  @csrf
                                  <button type="submit">削除</button>
                                </form>
                              </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer position-fixed bottom-5 ml-2">
            <button onclick="location.href='/user/timetable'" class="mt-24 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
        </div>
    </body>
</html>