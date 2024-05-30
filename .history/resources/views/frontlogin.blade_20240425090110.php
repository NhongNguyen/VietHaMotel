@extends('frontlayout')
@section('content')

<div class="container my-4">
	<!-- <h3 class="mb-3">Đăng nhập</h3> -->
	@if(Session::has('error'))
	<p class="text-danger">{{session('error')}}</p>
	@endif
	<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div> -->

    <!-- Login Form -->
    <form method="post" action="{{url('khachthue/login')}}">
		@csrf
      <input type="text" id="login" class="fadeIn second" name="SDT" placeholder="Tài khoản">
      <input type="text" id="password" class="fadeIn third" name="matKhau" placeholder="Mật khẩu">
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
