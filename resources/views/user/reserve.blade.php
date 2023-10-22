<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>教室予約画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  </head>
  <body>
      <h1>予約受付</h1>
      
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          予約状況を確認
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">予約が入っている日</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="card" style="width: 18rem;">
                  <ul class="list-group list-group-flush">
                    @foreach($reserve_data as $reserve)
                      <li class="list-group-item">{{$reserve->reserve_date}}  ({{$reserve->time_id}}時間目)</li>
                    @endforeach
                  </ul>
                </div>
        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
              </div>
            </div>
          </div>
        </div>
      
      
       <script>
            @if (session('flash_message'))
                $(function () {
                        toastr.success('{{ session('flash_message') }}');
                });
            @endif
        </script>
        
  
         
          
        <form method = "post" action = "/user/reserve/{{$classroom}}">
          @csrf
            <input type="hidden" name="reserve[user_id]" value="{{Auth::user()->id}}">
            <input type="hidden" name="reserve[classroom_id]" value="{{$classroom}}">
            
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