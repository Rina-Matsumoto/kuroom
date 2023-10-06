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
      <div class="row">
      　<div class="col">
            <select class="form-select" aria-label="Default select example">
                <option selected>2023年</option>
                 <option value="1">月</option>
                 <option value="2">火</option>
                 <option value="3">水</option>
                 <option value="4">木</option>
                 <option value="5">金</option>
                 <option value="6">土</option>
                 <option value="7">日</option>
            </select>
      　</div>
      　<div class="col">
            <select class="form-select" aria-label="Default select example">
                <option selected>1月</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
      　</div>
    　</div>
      
      <table class="table">
          <tbody>
            <tr>
              <td>1/1(土)</td>
              <td>
                  月<br>
                  3<br>
                  Jacob<br>
                  a@a<br>
                  サークル
              </td>
            </tr>
            <tr>
              <td>1/1(土)</td>
              <td>
                  月<br>
                  4<br>
                  Jacob<br>
                  a@a<br>
                  自習
              </td>
            </tr>
          </tbody>
        </table>
        <div class="d-grid gap-2 d-md-block">
          <a class="btn btn-primary" href="/admin/create">教室追加</a>
          <a class="btn btn-primary" href="/admin/index">戻る</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>