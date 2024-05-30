@extends('frontlayout')
@section('content')

<div class="container" style="height:500px;">
	<!-- <h3 class="mb-3">Đăng nhập</h3> -->
	@if(Session::has('error'))
	<p class="text-danger">{{session('error')}}</p>
	@endif
	<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Login Form -->
    <form method="post" action="{{url('khachthue/login')}}">
		@csrf
    <div style="padding-top:10px; color:black;padding-bottom:10px;"><h2>Chọn thành viên</h2> </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="nomem" id="inlineRadio2" value="option1">
        <label class="form-check-label" for="inlineRadio1">Không thành viên</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="mem" id="inlineRadio2" value="option12">
        <label class="form-check-label" for="inlineRadio2">Có thành viên</label>
      </div>
      <input type="submit" class="fadeIn fourth mt-4" value="Chấp nhận">
    </form>
  </div>
</div>
</div>

@endsection
