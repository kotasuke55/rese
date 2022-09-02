<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    <title>Management</title>
</head>
<body>
  <h2>ログイン中のuser {{$user->name}}</h2>
  <div class="main">
    <div class="create">
      <p class="ttl">店舗の作成</p>
      <form action="create" method="post">
        @csrf
        <table>
          <tr>
            <th>店舗名</th>
            <td><input type="text" name="shop"></td>
          </tr>
          <tr>
            <th>お店の説明</th>
            <td><input type="text" name="content"></td>
          </tr>
          <tr>
            <th>店舗画像(URL)</th>
            <td><input type="text" name="img"></td>
          </tr>
          <tr>
            <th>エリア番号</th>
            <td><input type="number" name="area_id"></td>
          </tr>
          <tr>
            <th>ジャンル番号</th>
            <td><input type="number" name="genre_id"></td>
          </tr>
          <tr>
            <th>店舗代表者ID</th>
            <td><input type="number" name="representative_id"></td>
          </tr>
        </table>
        <button>新規作成</button>
      </form>
    </div>
    <div class="edit">
      <p class="ttl">店舗情報の更新</p>
      <p class="ttl">店舗の選択</p>
      <form action="select" method="post">
        @csrf
        <select name="id">
          @foreach($shops as $shop)
            <option value="{{ $shop->id }}">{{ $shop->id }} {{ $shop->shop }}</option>
          @endforeach
        </select>
        <button>送信</button>
      </form>
    </div>
    <div class="reserves">
      <p class="ttl">予約の確認</p>
      <form action="reserve" method="post">
        @csrf
         <select name="id">
          @foreach($reserve_shops as $reserve_shop)
          <option value="{{ $reserve_shop->id }}">{{ $reserve_shop->id }} {{ $reserve_shop->shop }}</option>
          @endforeach
        </select>
        <button>送信</button>
      </form>
    </div>
    <div class="images">
      <p class="ttl">店舗画像を保存する</p>
      <form action="image" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="file" name="file" required>
        <input class="shop_id" type="number" name="shop_id" placeholder="店舗ID" required>
        <button>アップロード</button>
      </form>
      <a href="/storage/store/1/upload.jpg">アップロードファイル</a>
      {{ asset('storage/store/{$id}/upload.jpg') }}
      
      <img src="{{asset('storage/store/2/upload.jpg')}}" alt="">
    </div>
  </div>
</body>