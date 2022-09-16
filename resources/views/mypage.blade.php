@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/mypage.css">
<h2 class="user-name">{{$user}}さん</h2>
<div class="mypage">
  <div class="reserves">
    <div class="reserves__inner">
      <h2 class="reserves__ttl">予約状況</h2>
      @foreach($reserves as $reserve)
      <div class="reserves__content">
        <div class="reserves-header">
          <div class="header-left">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"/></svg>
            <h3 class="reserves-number">予約{{$reserve->id}}</h3>
          </div>
          <div class="header-right">
            <form action="reserve/delete" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$reserve->id}}">
              <button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg></button>
            </form>
          </div>
        </div>
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $reserve->shop->shop }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>{{ $reserve->date }}</td>
          </tr>
          <tr>
            <th>Time</th>
            <td>{{ $reserve->time }}</td>
          </tr>
          <tr>
            <th>Number</th>
            <td>{{ $reserve->number }}人</td>
          </tr>
        </table>
        <div class="edit">
          @if(\Carbon\Carbon::now() < $reserve->date)
            <form action="/edit" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $reserve->id }}">
              <button class="edit__btn">変更する</button>
            </form>
            @else
            <form action="evaluation" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $reserve->id }}">
              <button class="edit__btn">評価する</button>
            </form>
          @endif
        </div>
        <form action="qrcode" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $reserve->id }}">
          <button class="edit__btn">QRコードを生成する</button>
        </form>
      </div>
      @endforeach
    </div>
  </div>
  <div class="likes">
    <div class="likes__inner">
      <h2 class="likes__ttl">お気に入り店舗</h2>
      <div class="likes__content">
        @foreach($likes as $like)
        <div class="shop__card">
          <!-- ↓heroku環境での画像の表示 -->
          @if($like->shop->id > 20)
          <img class="shop__img" src="data:image/png;base64,<?= $like->shop->img ?>" alt="">
          @else 
          <img class="shop__img" src="{{asset($like->shop->img)}}" alt="">
          @endif

          <!-- ↓local環境 -->
          <!-- <img class="shop__img" src="{{asset($like->shop->img)}}" alt=""> -->
          <div class="card__text">
            <p class="shop-name">{{$like->shop->shop}}</p>
            <div class="hashutag">
              <p>#{{$like->shop->area->name}}</p>
              <p>#{{$like->shop->genre->name}}</p>
            </div>
            <div class="form">
              <form action="/detail" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $like->shop->id }}">
              <button class="btn">詳しく見る</button>
              </form>
              @auth
              @if(!$like->shop->is_liked_by_auth_user())
              <form action="/like" method="post">
              @csrf
                <input type="hidden" name="id" value="{{ $like->shop->id }}">
                <button class="like" ><img class="like_img" src="/img/heart_shape-1-2.jpg" alt=""></button>
              </form>
              @else
              <form action="/unlike" method="post">
              @csrf
                <input type="hidden" name="id" value="{{ $like->shop->id }}">
                <button class="unlike"><img class="unlike_img" src="/img/heart_shape-1.jpg" alt=""></button>
              </form>
              @endif
              @endauth
            </div>
          </div>
        </div> 
        @endforeach
      </div>
      
    </div>

  </div>
</div>
@endsection