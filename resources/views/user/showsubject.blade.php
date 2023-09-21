<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>時間割</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <div id="subjects">
                <h3>時間割</h3>
                @foreach ($subjects as $subject)
                    <p>{{ $subject->subject_name }}</p>    
                @endforeach
            </div>
        </div>
        <div class="footer">
            <a href="/user/timetable">戻る</a>
        </div>
    </body>
</html>