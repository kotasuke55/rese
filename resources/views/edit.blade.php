@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/edit.css">
<div class="shop__header">
  <a class="back" href="javascript:history.back()"><</a>
  <p class="back-text">戻る</p>
</div>
  <form action="reserve/update" method="post" class="reserve">
    @csrf
    <input type="hidden" name="id" value="{{ $reserve->id }}">
    <input type="hidden" name="user_id" value="{{ $reserve->user->id }}">
    <input type="hidden" name="shop_id" value="{{ $reserve->shop->id }}">
    <div class="reserve__inner">
      <h2 class="reserve__ttl">予約</h2>
      <input type="date" name="date" id="date">
      <div class="select">
        <select name="time" id="time">
        @for($time=10;$time<=22;$time++)
          <option value="{{ $time }}:00">{{$time}}:00</option>
          <option value="{{ $time }}:30">{{$time}}:30</option>
        @endfor 
        </select>
      </div>
      <div class="select">
        <select name="number" id="number">
        @for($i=1; $i<=8; $i++)
        <option value="{{ $i }}">{{$i}}人</option>
        @endfor
        </select>
      </div>
      <div class="reserve-confirm">
        <table>
          <tr>
            <th>Shop</th>
            <td>{{ $reserve->shop->shop }}</td>
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
    <button class="btn">予約を変更する</button>
    @endauth
    @guest
    <a href="/login" class="guest">予約を変更する</a>
    @endguest
  </form>
@endsection