<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>時間割</title>
        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <h3 class="relative w-full text-2xl font-semibold">時間割</h3>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
                <div class="p-2">
                    <div class="mt-4">
                        <div class="content">
                            <div id="subjects">
                                @foreach ($subjects as $subject)
                                    <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600 lg:text-3xl border border-gray-300 p-6 rounded-lg">{{ $subject->subject_name }}</h1>    
                                @endforeach
                            </div>
                        </div>
                        <div class="footer">
                             <!--<a href="/user/timetable" class="inline-flex items-center mt-4 font-semibold text-blue-600 lg:mb-0 hover:text-neutral-600">戻る</a>-->
                        <button onclick="location.href='/user/timetable'" class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>