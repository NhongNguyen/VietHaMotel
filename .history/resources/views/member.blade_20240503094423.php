@extends('frontlayout')
@section('content')
  <form action="">
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="nomem">Không có thành viên
      </label>
    </div>
    <div class="form-check disabled">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="mem" disabled> Có thành viên
      </label>
    </div>
  </form>
@endsection