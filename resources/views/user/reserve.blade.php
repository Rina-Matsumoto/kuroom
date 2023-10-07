<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>教室予約画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
      <h1>予約受付</h1>
        <form method = "post" action = "/user/reserve/{{$classroom}}">
          @csrf
            <div class="mb-3">
                <label  class="form-label">【1】予約日を選択</label>
                <input type="date" class="form-control" name="reserve[reserve_date]" value="{{old('reserve.reserve_date')}}" min={{$tomorrow}} max={{$max}}>
                @error('reserve.reserve_date')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">【2】時間を選択</label>
                <select class="form-select" name="reserve[time_id]">
                    @foreach($times as $time)
                        <option value = "{{$time->id}}" name="reserve[time_id]" @if(old('reserve.time_id')==$time->id) selected @endif>{{$time->time}}</option>
                    @endforeach
                </select>
                @error('reserve.time_id')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">【3】曜日を選択</label>
                <select class="form-select" name="reserve[day_id]">
                     @foreach($days as $day)
                　　　　<option value="{{$day->id}}" name="reserve[day_id]" @if(old('reserve.day_id')==$day->id) selected @endif>{{$day->day}}</option>
                　 　 @endforeach
                </select>
                @error('reserve.day_id')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                @enderror
            </div>
          　
          　<div class="mb-3">
            　<label class="form-label">【4】ユーザー名</label>
            　<input type="text" class="form-control"  name="reserve[user_name]" value="{{Auth::user()->name}}" aria-describedby="emailHelp">
          　     @error('reserve.user_name')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                @enderror
          　</div>
          　
          　<div class="mb-3">
            　<label class="form-label">【5】Email</label>
            　<input type="email" class="form-control"name="reserve[user_email]" value="{{Auth::user()->email}}">
          　     @error('reserve.user_email')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                @enderror
          　</div>
          　
          　<div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">【6】利用目的</label>
              <textarea class="form-control"name="reserve[text]" rows="3">{{old('reserve.text')}}</textarea>
                @error('reserve.text')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                @enderror
            </div>
            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-primary" type="submit">確認画面へ</button>
              <a class="btn btn-primary" href="/user/index">戻る</a>
            </div>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>