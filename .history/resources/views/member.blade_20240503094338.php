@extends('frontlayout')
@section('content')
  <form action="">
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio">Không có thành viên
      </label>
    </div>
    <div class="form-check disabled">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio" disabled>
      </label>
    </div>
  </form>
@endsection