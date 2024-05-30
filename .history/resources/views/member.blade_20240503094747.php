@extends('frontlayout')
@section('content')

<div class="container my-4">
	<!-- <h3 class="mb-3">Đăng nhập</h3> -->
	@if(Session::has('error'))
	<p class="text-danger">{{session('error')}}</p>
	@endif
	<div style="margin-bottom: 200px;" class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Login Form -->
    <form method="post" action="{{url('khachthue/login')}}">
		@csrf
    <div style="padding-top:10px; color:black;"><h2>Chọn thành viên</h2> </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">1</label>
      </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
      <label class="form-check-label" for="inlineCheckbox2">2</label>
    </div>

      <input type="submit" class="fadeIn fourth" value="Đăng nhập">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Quên mật khẩu?</a>
    </div>

  </div>
</div>
</div>

@endsection
