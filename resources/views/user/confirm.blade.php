<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>教室予約確認</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <form method = "post" action = "/user/complete/{{$classroom}}">
        @csrf
        <!--formで送信する値-->
        <input type="hidden" name="reserve[reserve_date]" value="{{$input['reserve']['reserve_date']}}">
        <input type="hidden" name="reserve[time_id]" value="{{$input['reserve']['time_id']}}">
        <input type="hidden" name="reserve[day_id]" value="{{$input['reserve']['day_id']}}">
        <input type="hidden" name="reserve[user_name]" value="{{$input['reserve']['user_name']}}">
        <input type="hidden" name="reserve[user_email]" value="{{$input['reserve']['user_email']}}">
        <input type="hidden" name="reserve[text]" value="{{$input['reserve']['text']}}">
        
        <h1>予約確認</h1>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">日時</th>
              <td>{{$input['reserve']['reserve_date']}}</td>
            </tr>
            <tr>
              <th scope="row">時間</th>
              <td>{{$input['reserve']['time_id']}}</td>
            </tr>
            <tr>
              <th scope="row">曜日</th>
              <td>{{$input['reserve']['day_id']}}</td>
            </tr>
            <tr>
              <th scope="row">ユーザー名</th>
              <td>{{$input['reserve']['user_name']}}</td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td colspan="2">{{$input['reserve']['user_email']}}</td>
            </tr>
            <tr>
              <th scope="row">目的</th>
              <td>{{$input['reserve']['text']}}</td>
            </tr>
          </tbody>
        </table>
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-primary" type="submit">予約確定</button>
          <button class="btn btn-primary" type="submit" name="back">修正する</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>