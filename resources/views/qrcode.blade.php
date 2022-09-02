<div class="qr">
  {!! QrCode::size(300)->generate(route('inquiry',['reserve'=>$reserve])) !!}
</div>

<style>
  .qr {
    text-align:center;
    margin-top:100px;
  }
</style>

