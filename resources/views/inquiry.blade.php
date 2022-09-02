<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <title>Rese</title>
</head>
<body>
  <div class="reserve">
    <p>予約の名前 : {{ $reserve->user->name }}様</p>
    <p>予約の日にち : {{ $reserve->date }}</p>
    <p>予約の時間 : {{ $reserve->time }}</p>
    <p>予約の人数 : {{ $reserve->number }}名様</p>
  </div>
</body>

<style>
  .reserve {
    text-align:center;
    margin-top:100px;
  } 

  p {
    font-size:30px;
  }
</style>