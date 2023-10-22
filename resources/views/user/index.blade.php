<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>空き教室</title>
        <link href="/dist/output.css" rel="stylesheet">
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
                                <td class="cell"><a href="/user/show/{{$day->id}}/{{ $time->id}}"></a></td>
                            @endforeach
                @endforeach
                    </tr>
            </tbody>
        </table>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </x-app-layout>
</html>