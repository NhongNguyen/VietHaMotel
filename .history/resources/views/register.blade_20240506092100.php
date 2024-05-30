@extends('frontlayout')
@section('content')
<div class="container my-4">
    @if(Session::has('success'))
    <p class="text-success">{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ url('admin/khachthue') }}" enctype="multipart/form-data">
        @csrf
        <div class="wrapper fadeInDown">
            <div id="formContent" class="formlogin">
                <div style="padding-top:10px;"><h2>ĐĂNG KÍ</h2> </div>
                <input name="hoKhach" type="text" class="fadeIn second" placeholder="Họ khách thuê" required>
                <input name="tenKhach" type="text" class="fadeIn third" placeholder="Tên khách thuê" required>
                <input name="ngaySinh" type="date" id="ngaySinhInput" max="{{ date('Y-m-d') }}" class="fadeIn third" placeholder="Ngày sinh" required>
                <input name="queQuan" type="text" class="fadeIn third" placeholder="Quê quán" required>
                <input name="noiThuongTru" type="text" class="fadeIn third" placeholder="Nơi thường trú" required>
                <input name="soCCCD" type="text" class="fadeIn third" placeholder="Số CCCD" required>
                <input name="ngayCap" type="date" max="{{ date('Y-m-d') }}" class="fadeIn third" placeholder="Ngày cấp" required>
                <input name="noiCap" type="text" class="fadeIn third" placeholder="Nơi cấp" required>
                <select name="gioiTinh" class="fadeIn third">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                <input type="text" pattern="[0-9]{8,10}" minlength="8" maxlength="10" name="SDT" class="fadeIn third" required placeholder="Tài khoản (Số điện thoại)">
                <input name="matKhau"  id="password" type="password" class="fadeIn third" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" placeholder="Mật khẩu" title="Mật khẩu phải chứa ít nhất một chữ cái và một số, và có ít nhất 8 ký tự" required />
                <span class="fa fa-eye show"></span> 
                <input name="CCCDtruoc" type="file" class="fadeIn third" required placeholder="CCCD mặt trước">
                <input name="CCCDsau" type="file" class="fadeIn third" required placeholder="CCCD mặt sau">
                <input name="anhDaiDien" type="file" class="fadeIn third" placeholder="Ảnh đại diện">
                <input type="hidden" name="ref" value="front">
                <input type="submit" class="fadeIn fourth" value="Chấp nhận">
            </div>
        </div>
    </form>
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
