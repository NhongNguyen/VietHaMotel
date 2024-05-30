@extends('frontlayout')
@section('content')
<div class="container my-4">
    @if(Session::has('success'))
    <p class="text-success">{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ url('admin/khachthue') }}" enctype="multipart/form-data">
        @csrf
        <div class="wrapper fadeInDown">
            <div id="formContent" class="formlogin" style="max-width: 900px; margin: auto;">
                <div style="padding-top:10px;">
                    <h2>ĐĂNG KÍ</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input name="hoKhach" type="text" class="fadeIn second form-control" placeholder="Họ khách thuê" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="tenKhach" type="text" style="margin-top:30px" class="fadeIn third form-control" placeholder="Tên khách thuê" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ngaySinh">Ngày sinh</label>
                        <input name="ngaySinh" type="date" id="ngaySinhInput" max="{{ date('Y-m-d') }}" class="fadeIn third form-control" placeholder="Ngày sinh" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="queQuan" type="text" class="fadeIn third form-control" placeholder="Quê quán" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="noiThuongTru" type="text" class="fadeIn third form-control" placeholder="Nơi thường trú" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="soCCCD" type="text" class="fadeIn third form-control" placeholder="Số CCCD" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="ngayCap">Ngày cấp</label>
                        <input name="ngayCap" type="date" max="{{ date('Y-m-d') }}" class="fadeIn third form-control" placeholder="Ngày cấp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="noiCap" type="text" class="fadeIn third form-control" placeholder="Nơi cấp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select name="gioiTinh" class="fadeIn third form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" pattern="[0-9]{8,10}" minlength="8" maxlength="10" name="SDT" class="fadeIn third form-control" required placeholder="Tài khoản (Số điện thoại)">
                    </div>
                    <div class="col-md-6 mb-3 position-relative">
                        <input name="matKhau" id="password" type="password" class="fadeIn third form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" placeholder="Mật khẩu" title="Mật khẩu phải chứa ít nhất một chữ cái và một số, và có ít nhất 8 ký tự" required />
                        <span class="fa fa-eye show" style="position: absolute; right: 15px; top: 20%; transform: translateY(-50%); cursor: pointer;"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="CCCDtruoc" type="file" class="fadeIn third form-control" required placeholder="CCCD mặt trước">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="CCCDsau" type="file" class="fadeIn third form-control" required placeholder="CCCD mặt sau">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input name="anhDaiDien" type="file" class="fadeIn third form-control" placeholder="Ảnh đại diện">
                    </div>
                </div>
                <input type="hidden" name="ref" value="front">
                <input type="submit" class=" home-btn-register fadeIn fourth btn btn-primary mt-3" value="Chấp nhận">
            </div>
        </div>
    </form>
</div>
<script>
    const eye = document.querySelector(".show");
    const password = document.querySelector("#password");

    eye.addEventListener("click", showPassword);

    function showPassword(e) {
        const input = this.previousElementSibling;
        const inputType = input.getAttribute("type");
        if (inputType == "password") {
            input.setAttribute("type", "text");
            e.target.classList.remove("fa-eye");
            e.target.classList.add("fa-eye-slash");
        } else {
            input.setAttribute("type", "password");
            e.target.classList.remove("fa-eye-slash");
            e.target.classList.add("fa-eye");
        }
    }
</script>
@endsection
