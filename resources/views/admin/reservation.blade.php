<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>予約リスト</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
      <h1>予約リスト</h1>
     <!-- <div class="row">-->
     <!-- 　<div class="col">-->
     <!--       <select name="year" class="form-select">-->
     <!--         @for($i = date('Y'); $i >= date('Y') - 1; $i--) <option value="{{ $i }}">{{ $i }}</option> @endfor-->
     <!--       </select>-->
     <!-- 　</div>-->
      　
     <!-- 　<div class="col">-->
     <!--       <select name="month" class="form-select">-->
     <!--         @for($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option> @endfor-->
     <!--       </select>-->
     <!-- 　</div>-->
    　<!--</div>-->
      
      <table class="table">
          <tbody>
            @foreach($reserves as $reserve)
              <tr>
                <td>{{$reserve->reserve_date}}</td>
                <td>
                    {{$reserve->day_id}}<br>
                    {{$reserve->user_name}}<br>
                    {{$reserve->user_email}}<br>
                    {{$reserve->text}}<br>
                    {{$reserve->classroom_name}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-grid gap-2 d-md-block">
          <a class="btn btn-primary" href="/admin/create">教室追加</a>
          <a class="btn btn-primary" href="/admin/index">戻る</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>