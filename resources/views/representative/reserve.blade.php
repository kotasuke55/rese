<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/management.css') }}">
  <title>Reserve</title>
</head>
<body>
  <div class="main">
    <div class="reserve">      
      @foreach($reserves as $reserve)
        <div class="content">
          <h4>予約状況</h2>
          <table class="reserve-table">
            <tr>
              <th>店舗名</th>
              <td>{{ $reserve->shop->shop }}</td>
            </tr>
            <tr>
              <th>日にち</th>
              <td>{{ $reserve->date }}</td>
            </tr>
            <tr>
              <th>時間</th>
              <td>{{ $reserve->time }}</td>
            </tr>
            <tr>
              <th>人数</th>
              <td>{{ $reserve->number }}</td>
            </tr>
          </table>
        </div>
      @endforeach
    </div>
  </div>
</body>