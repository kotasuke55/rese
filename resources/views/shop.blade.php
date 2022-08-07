@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/shop.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  @foreach($shops as $shop)
    <div class="shop__card">
      <img class="shop__img" src="{{$shop->img}}" alt="">
      <div class="card__text">
        <p class="shop-name">{{$shop->shop}}</p>
        <div class="hashutag">
          <p>#{{$shop->area_id}}</p>
          <p>#{{$shop->genre_id}}</p>
        </div>
        <div class="form">
          <form action="/detail" method="post">
          @csrf
          <input type="hidden" name="id" value="{{ $shop->id }}">
          <button class="btn">詳しく見る</button>
          </form>
          @auth
          @if(!$shop->is_liked_by_auth_user())
          <form action="/like" method="post">
          @csrf
            <input type="hidden" name="id" value="{{ $shop->id }}">
            <button class="like" ><img class="like_img" src="/img/heart_shape-1-2.jpg" alt=""></button>
          </form>
          @else
          <form action="/unlike" method="post">
          @csrf
            <input type="hidden" name="id" value="{{ $shop->id }}">
            <button class="unlike"><img class="unlike_img" src="/img/heart_shape-1.jpg" alt=""></button>
          </form>
          @endif
          @endauth
        </div>
      </div>
    </div> 
@endforeach
@endsection