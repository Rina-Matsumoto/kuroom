<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>時間割表</title>
        <!-- Bootstrap CSS 表のボーダーに使っている-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    </head>
    <x-app-layout>
        <body>
            <table class="table table-bordered min-h-screen">
                <thead>
                    <tr>
                        <th></th>
                        @foreach($days as $day)
                            <th class="day">{{$day->day}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($times as $time)
                        <tr>
                            <th class="time">{{$time->time}}</th>
                                @foreach($days as $day)
                                    <td class="cell"><a href="/user/showsubject/{{$day->id}}/{{ $time->id}}"></a></td>
                                @endforeach
                    @endforeach
                        </tr>
                </tbody>
            </table>
            <button onclick="location.href='/user/create'" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">追加</button>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        </body>
    </x-app-layout>
</html>