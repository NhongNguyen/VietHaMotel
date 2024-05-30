@extends('frontlayout')
@section('content')

<div class="container my-4">
	<!-- <h3 class="mb-3">Đăng nhập</h3> -->
	@if(Session::has('error'))
	<p class="text-danger">{{session('error')}}</p>
	@endif
	<!-- <form method="post" action="{{url('customer/login')}}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th>Email</th>
				<td><input required type="text" class="form-control" name="SDT"></td>
			</tr>
			<tr>
				<th>Mật khẩu</th>
				<td><input required type="password" class="form-control" name="matKhau"></td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" class="btn btn-primary" /></td>
			</tr>
		</table>
		
	</form> -->
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
