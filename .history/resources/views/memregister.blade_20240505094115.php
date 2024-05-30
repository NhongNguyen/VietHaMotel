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
            <!-- Register Form -->
            <form enctype="multipart/form-data" method="post" action="{{url('admin/thanhvien')}}">
                @csrf
                <div style="padding-top:10px; color:black;"><h2>ĐĂNG KÝ THÀNH VIÊN</h2> </div>
                <input type="text" required id="hoThanhVien" class="fadeIn second" name="hoThanhVien" placeholder="Họ thành viên">
                <input type="text" required id="tenThanhVien" class="fadeIn third" name="tenThanhVien" placeholder="Tên thành viên">
                <input type="file" required id="CCCDtruoc" class="fadeIn fourth" name="CCCDtruoc" placeholder="CCCD mặt trước">
                <input type="file" required id="CCCDsau" class="fadeIn fifth" name="CCCDsau" placeholder="CCCD mặt sau">
                <input type="">
                <input type="submit" class="fadeIn sixth" value="Đăng ký">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Quên mật khẩu?</a>
            </div>

        </div>
    </div>
</div>

@endsection
