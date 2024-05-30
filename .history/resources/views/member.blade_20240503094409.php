@extends('frontlayout')
@section('content')
  <form action="">
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="mem">Không có thành viên
      </label>
    </div>
    <div class="form-check disabled">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio" disabled> Có thành viên
      </label>
    </div>
  </form>
@endsection