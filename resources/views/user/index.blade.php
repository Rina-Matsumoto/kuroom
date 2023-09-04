<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>時間割表</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <x-app-layout>
        <x-slot name="header">
            時間割表
        </x-slot>
    <body>
        <table class="table table-bordered" style="width: 100%; height:100%;">
            <thead>
                <tr>
                    <th></th>
                    @foreach($days as $day)
                        <th>{{$day->day}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($times as $time)
                    <tr>
                        <td>{{$time->time}}</td>
                            @foreach($days as $day)
                                <td><a style="width:100%; height:100%; display:block;"  href="/user/show/{{$day->id}}/{{ $time->id}}"></a></td>
                            @endforeach
                @endforeach
                    </tr>
            </tbody>
        </table>
        <table style="width: 200px; height:200px;">
            <tr>
                <td>
                    <a style="width:100%; height:100%; display:block;" href="http://yokano-jp.blogspot.jp/">
                    </a>
                </td>
            </tr>
        </table>
        <a href='/user/create'>追加</a>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </x-app-layout>
</html>