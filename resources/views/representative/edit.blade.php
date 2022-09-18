<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/management.css') }}">
  <title>Edit</title>
</head>
<body>
  <div class="main">
    <h3>店舗情報の更新</h3>
    <form action="update" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="id" value="{{ $shop->id }}">
        <table>
            @error('shop')
            <tr>
                <th></th>
                <td><span>{{$message}}</span></td>
            </tr>
            @enderror
            <tr>
                <th>店舗名</th>
                <td>
                    <input type="text" name="shop" value="{{ $shop->shop }}">
                </td>
            </tr>
            @error('content')
            <tr>
                <th></th>
                <td><span>{{$message}}</span></td>
            </tr>
            @enderror
            <tr>
                <th>店舗説明文</th>
                <td>
                    <textarea name="content"cols="100" rows="5">{{ $shop->content }}</textarea>
                </td>
            </tr>
            @error('img')
            <tr>
                <th></th>
                <td><span>{{$message}}</span></td>
            </tr>
            @enderror
            <tr>
                <th>画像</th>
                <td>
                    <input type="file" name="img">
                </td>
            </tr>
            @error('area_id')
            <tr>
                <th></th>
                <td><span>{{$message}}</span></td>
            </tr>
            @enderror
            <tr>
                <th>エリア</th>
                <td>
                    <select name="area_id">
                        @foreach($areas as $area)
                        <option value="{{$area->id}}">{{ $area->id }} {{ $area->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @error('genre_id')
            <tr>
                <th></th>
                <td><span>{{$message}}</span></td>
            </tr>
            @enderror
            <tr>
                <th>ジャンル</th>
                <td>
                    <select name="genre_id">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{ $genre->id }} {{ $genre->name }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            @error('representative_id')
            <tr>
                <th></th>
                <td><span>{{$message}}</span></td>
            </tr>
            @enderror
            <tr>
                <th>店舗代表者ID</th>
                <td>
                    <input type="number" name="representative_id" value="{{ $shop->representative_id }}">
                </td>
            </tr>
        </table>
        <div class="btn">
            <button>更新する</button>    
        </div>
    </form>
    <form action="representative/delete"  method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $shop->id }}">
        <input type="hidden" name="shop_id" value="">
        <div class="btn">
            <button>削除する</button>    
            <a href="javascript:history.back()">戻る</a>
        </div>
    </form>
  </div>
</body>