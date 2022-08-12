@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/detail.css">
<div class="detail">
  <div class="shop">
    <div class="shop__header">
      <a class="back" href="javascript:history.back()"><</a>
      <h2 class="shop__ttl">{{ $shop->shop }}</h2>
    </div>
    <img src="{{ $shop->img }}" alt="img">
    <div class="hashutag">
      <p>#{{ $shop->area->name }}</p>
      <p>#{{ $shop->genre->name }}</p>
    </div>
    <p class="shop__content">
      {{ $shop->content }}
    </p>
  </div>
  <form action="/reserve" method="post" class="reserve">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
    <div class="reserve__inner">
      <h2 class="reserve__ttl">予約</h2>
      <input type="date" name="date" id="date">
      <select name="time" id="time">
      @for($time=10;$time<=22;$time++)
        <option value="{{ $time }}:00">{{$time}}:00</option>
        <option value="{{ $time }}:30">{{$time}}:30</option>
      @endfor 
      </select>
      <select name="number" id="number">
      @for($i=1; $i<=8; $i++)
      <option value="{{ $i }}">{{$i}}人</option>
      @endfor
      </select>
      <div class="reserve-confirm">
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $shop->shop }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td id="outputDate"></td>
          </tr>
          <tr>
            <th>Time</th>
            <td id="outputTime"></td>
          </tr>
          <tr>
            <th>Number</th>
            <td id="outputNumber"></td>
          </tr>
        </table>
      </div>
    </div>
    @auth
    <button class="btn">予約する</button>
    @endauth
    @guest
    <a href="/login" class="btn guest">予約する</button>
    @endguest
  </form>
</div>
@endsection