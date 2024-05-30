@extends('frontlayout')
@section('content')

<div class="container" style="height:500px;">
    @if(Session::has('error'))
    <p class="text-danger">{{session('error')}}</p>
    @endif
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Login Form -->
            <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="nomem" value="0">
                    <label class="form-check-label" for="inlineRadio1">Không thành viên</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="mem" value="mem">
                    <label class="form-check-label" for="inlineRadio2">Có thành viên</label>
                </div>
            <form action="{{ route('chon_thanh_vien') }}" method="POST">
                <div style="padding-top:10px; padding-bottom:10px; color:black;"><h2>THÀNH VIÊN</h2> </div>
                @csrf
               
             
                <input type="submit" class="fadeIn fourth mt-4 display-4" value="Chấp nhận">
            </form>
            <form enctype="multipart/form-data" method="post" action="{{url('admin/thanhvien')}}">
                @csrf
                <div style="padding-top:10px; color:black;"><h2>ĐĂNG KÝ THÀNH VIÊN</h2> </div>
                <input type="text" required id="hoThanhVien" class="fadeIn second" name="hoThanhVien" placeholder="Họ thành viên">
                <input type="text" required id="tenThanhVien" class="fadeIn third" name="tenThanhVien" placeholder="Tên thành viên">
                <input type="file" required id="CCCDtruoc" class="fadeIn fourth" name="CCCDtruoc" placeholder="CCCD mặt trước">
                <input type="file" required id="CCCDsau" class="fadeIn fifth" name="CCCDsau" placeholder="CCCD mặt sau">
                <input type="hidden" name="ref" value="frontregister">
                <input type="submit" class="fadeIn sixth" value="Đăng ký">
            </form>
        </div>
    </div>
</div>

@endsection