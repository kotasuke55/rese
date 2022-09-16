@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/shop.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="search">
  <div class="search__inner">
    <form action="/search" method="post">
    @csrf
        <select name="search_area">
          <option value="">All area</option>
          @foreach($areas as $area)
          <option value="{{ $area->id }}">{{ $area->name }}</option>
          @endforeach
        </select>
        <select name="search_genre" id="genre">
          <option value="">All genre</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->name }}</option>
          @endforeach
        </select><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
        <input type="text" name="keyword" placeholder="Search...">
    </form>
  </div>
</div>

<div class="shop__content">
  @foreach($shops as $shop)
    <div class="shop__card">
      <!-- ↓heroku環境での画像の表示 -->
      @if($shop->id > 20)
      <img class="shop__img" src="data:image/png;base64,<?= $shop->img ?>" alt="">
      @else 
      <img class="shop__img" src="{{asset($shop->img)}}" alt="">
      @endif

      <!-- ↓local環境 -->
      <!-- <img class="shop__img" src="{{asset($shop->img)}}" alt=""> -->
      <div class="card__text">
        <p class="shop-name">{{$shop->shop}}</p>
        <div class="hashutag">
          <p>#{{$shop->area->name}}</p>
          <p>#{{$shop->genre->name}}</p>
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
</div>

@endsection