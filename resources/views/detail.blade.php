@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/detail.css">
<div class="detail">
  <div class="shop">
    <div class="shop__header">
      <a class="back" href="/"><</a>
      <h2 class="shop__ttl">{{ $shop->shop }}</h2>
    </div>
    <img src="{{ $shop->img }}" alt="img">
    <div class="hashutag">
      <p>#{{ $shop->area_id }}</p>
      <p>#{{ $shop->genre_id }}</p>
    </div>
    <p class="shop__content">
      {{ $shop->content }}
    </p>
  </div>
</div>
@endsection