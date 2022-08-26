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
    <form action="update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $shop->id }}">
        <table>
            <tr>
                <th>店舗名</th>
                <td>
                    <input type="text" name="shop" value="{{ $shop->shop }}">
                </td>
            </tr>
            <tr>
                <th>店舗説明文</th>
                <td>
                    <textarea name="content"cols="100" rows="5">{{ $shop->content }}</textarea>
                </td>
            </tr>
            <tr>
                <th>画像(URL)</th>
                <td>
                    <input type="text" name="img" value="{{ $shop->img }}">
                </td>
            </tr>
            <tr>
                <th>エリアID</th>
                <td>
                    <input type="number" name="area_id" value="{{ $shop->area_id }}">
                </td>
            </tr>
            <tr>
                <th>ジャンルID</th>
                <td>
                    <input type="number" name="genre_id" value="{{ $shop->genre_id }}">
                </td>
            </tr>
            <tr>
                <th>店舗代表者ID</th>
                <td>
                    <input type="number" name="representative_id" value="{{ $shop->representative_id }}">
                </td>
            </tr>
        </table>
        <div class="btn">
            <a href="javascript:history.back()">戻る</a>
            <button>更新する</button>    
        </div>
    </form>
  </div>
</body>