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
    <div style="padding-top:10px; color:black;"><h2>ĐĂNG NHẬP</h2> </div>
      <input type="text" required id="login" class="fadeIn second" name="SDT" placeholder="Tài khoản">
      <input type="password" required id="password" class="fadeIn third" name="matKhau" placeholder="Mật khẩu">
      <input type="submit" class="fadeIn fourth" value="Đăng nhập">
    </form>


  </div>
</div>
</div>
<script>
  password = document.querySelector("#matKhau");

  eye.addEventListener("click",showPassword);

  function showPassword (e){
    const input = this.previousElementSibling;
    const inputType = input.getAttribute("type");
    if (inputType == "password"){
      input.setAttribute("type", "text");
      e.target.classList.remove("fa-eye");
      e.target.classList.add("fa-eye-slash");
    }
    else{
      input.setAttribute("type", "password");
      e.target.classList.remove("fa-eye-slash");
      e.target.classList.add("fa-eye");
    } 
    
  }
</script>
@endsection
