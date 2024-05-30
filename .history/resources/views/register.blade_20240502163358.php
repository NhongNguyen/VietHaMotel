@extends('frontlayout')
@section('content')
<div class="container my-4">
    @if(Session::has('success'))
    <p class="text-success">{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ url('admin/khachthue') }}" enctype="multipart/form-data">
        @csrf
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div style="padding-top:10px; color:black;"><h2>ĐĂNG KÍ</h2> </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input name="hoKhach" type="text" class="fadeIn second" placeholder="Họ khách thuê" required>
                    </div>
               
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input name="ngaySinh" type="date" id="ngaySinhInput" max="{{ date('Y-m-d') }}" class="fadeIn third" placeholder="Ngày sinh" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input name="queQuan" type="text" class="fadeIn third" placeholder="Quê quán" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input name="noiThuongTru" type="text" class="fadeIn third" placeholder="Nơi thường trú" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input name="soCCCD" type="text" class="fadeIn third" placeholder="Số CCCD" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input name="ngayCap" type="date" max="{{ date('Y-m-d') }}" class="fadeIn third" placeholder="Ngày cấp" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input name="noiCap" type="text" class="fadeIn third" placeholder="Nơi cấp" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <select name="gioiTinh" class="fadeIn third">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" pattern="[0-9]{8,10}" minlength="8" maxlength="10" name="SDT" class="fadeIn third" required placeholder="Tài khoản (Số điện thoại)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input name="matKhau" type="password" class="fadeIn third" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" placeholder="Mật khẩu" title="Mật khẩu phải chứa ít nhất một chữ cái và một số, và có ít nhất 8 ký tự" required />
                    </div>
                    <div class="form-group col-md-6">
                        <input name="CCCDtruoc" type="file" class="fadeIn third" required placeholder="CCCD mặt trước">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input name="CCCDsau" type="file" class="fadeIn third" required placeholder="CCCD mặt sau">
                    </div>
                    <div class="form-group col-md-6">
                        <input name="anhDaiDien" type="file" class="fadeIn third" placeholder="Ảnh đại diện">
                    </div>
                </div>
                <input type="hidden" name="ref" value="front">
                <input type="submit" class="fadeIn fourth" value="Chấp nhận">
            </div>
        </div>
    </form>
</div>
@endsection
