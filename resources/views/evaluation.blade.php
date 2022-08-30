@extends('layouts.default')

@section('main')
<link rel="stylesheet" href="css/evaluation.css">
<div class="shop__header">
  <a class="back" href="javascript:history.back()"><</a>
  <p class="back-text">戻る</p>
</div>
<div class="evaluation">
  <h2 class="evaluation__ttl">評価する</h2>
  <div class="evaluation__inner">
    <p class="evaluation-shop">評価する店舗：{{ $reserve->shop->shop }}</p>
    <form action="evaluation/create" method="post">
      @csrf
      @error('evaluation')
        <p>{{ $message }}</p>
      @enderror
      <input type="radio" name="evaluation" value="1" checked>とても満足
      <input type="radio" name="evaluation" value="2">満足
      <input type="radio" name="evaluation" value="3">普通
      <input type="radio" name="evaluation" value="4">不満
      <input type="radio" name="evaluation" value="5">とても不満
      <p>ご意見</p>
      <textarea name="comment" class="comment" cols="70" rows="10"></textarea>
      <input type="hidden" name="user_id" value="{{ $reserve->user->id }}">
      <input type="hidden"  name="shop_id" value="{{ $reserve->shop->id }}">
      <input type="hidden" name="id" value="{{ $reserve->id }}">
      <div class="evaluation__btn">
        <button class="btn">送信</button>
      </div>
    </form>
  </div>
</div>
@endsection