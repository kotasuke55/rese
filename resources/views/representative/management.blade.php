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
  <div class="login">
    <h2>ログイン中のuser {{$user->name}}</h2>
    <form method="POST" action="{{ route('representative.logout') }}">
      @csrf
      <x-dropdown-link :href="route('representative.logout')"
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      {{ __('ログアウト') }}
      </x-dropdown-link>
    </form>
  </div>
  <div class="main">
    <div class="create">
      <p class="ttl">店舗の作成</p>
      <form action="create" method="post">
        @csrf
        <table>
          <tr>
            <th>店舗名</th>
            <td><input type="text" name="shop" required></td>
          </tr>
          <tr>
            <th>お店の説明</th>
            <td><input type="text" name="content" required></td>
          </tr>
          <tr>
            <th>店舗画像(URL)</th>
            <td><input type="text" name="img" value=" http://127.0.0.1:8000/storage/store/店舗ID/画像の名前" required></td>
          </tr>
          <tr>
            <th>エリア番号</th>
            <td>
              <select name="area_id">
                @foreach($areas as $area)
                  <option value="{{$area->id}}">{{ $area->name }}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <th>ジャンル番号</th>
            <td>
              <select name="genre_id">
                @foreach($genres as $genre)
                  <option value="{{$genre->id}}">{{ $genre->name }}</option>
                @endforeach
              </select>
            </td>
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
    </div>
  </div>
</body>