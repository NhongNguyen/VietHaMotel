@extends('frontlayout')
@section('content')

<div class="container my-4" style="height:460px;">
  <div class="wrapper fadeInDown">
    <div id="formContent" class="formlogin">
      <div style="padding-top:10px; color:black;"><h2>ĐĂNG NHẬP</h2> </div>
      <form method="post" action="{{url('khachthue/login')}}">
        @csrf
        <input type="text" required class="input-text fadeIn second" name="SDT" placeholder="Tài khoản">
        <input type="password" required class="input-text fadeIn third" name="matKhau" id="password" placeholder="Mật khẩu">
        <span class="fa fa-eye show"></span> <!-- Icon mật khẩu -->
        <input type="submit" class="input-submit fadeIn fourth" value="Đăng nhập">
      </form>
    </div>
  </div>
</div>
<script>
   eye = document.querySelector(".show");
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
