@extends('frontlayout')
@section('content')

<div class="container" style="height:600px;">
    @if(Session::has('error'))
    <p class="text-danger">{{session('error')}}</p>
    @endif
    <div class="wrapper fadeInDown" style="margin-top: -50px;">
        <div id="formContent" style=" padding:20px;">
            <!-- Tabs Titles -->
            <!-- Login Form -->
            <div style="padding-top:10px; color:black;"><h2>THÀNH VIÊN</h2> </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="nomem" onclick="toggleForm('nomemForm', 'memForm')">
                <label class="form-check-label" for="inlineRadio1">Không thành viên</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="mem" onclick="toggleForm('memForm', 'nomemForm')">
                <label class="form-check-label" for="inlineRadio2">Có thành viên</label>
            </div>
            <div id="nomemForm">
                <form enctype="multipart/form-data" method="post" action="{{url('admin/phongtro')}}">
                    @csrf
                    <input type="text"  name="phong_id" value="{{ $phong_id ?? '' }}">
                    <input name="soNamKetThuc" type="number" class="fadeIn second form-control" required placeholder="Nhập số năm kết thúc hợp đồng"/>
                    <input type="hidden" name="ref" value="frontregister">
                    <input type="submit" class="fadeIn sixth" value="Đăng ký phòng">
                </form>
            </div>
            <div id="memForm" style="display: none; margin-top:-30px; transition:all linear 0.5s">
                <form enctype="multipart/form-data" method="post" action="{{url('admin/thanhvien')}}">
                    @csrf
                    <input type="text" name="phong_id" value="{{ $phong_id ?? '' }}">
                    <div style="padding-top:10px; color:black;"><h2>ĐĂNG KÝ THÀNH VIÊN</h2> </div>
                    <input type="text" required id="hoThanhVien" class="fadeIn second" name="hoThanhVien" placeholder="Họ thành viên">
                    <input type="text" required id="tenThanhVien" class="fadeIn third" name="tenThanhVien" placeholder="Tên thành viên">
                    <input type="file" required id="CCCDtruoc" class="fadeIn fourth" name="CCCDtruoc" placeholder="CCCD mặt trước">
                    <input type="file" required id="CCCDsau" class="fadeIn fifth" name="CCCDsau" placeholder="CCCD mặt sau">
                    <input name="soNamKetThuc" type="number" required placeholder="Nhập số năm kết thúc hợp đồng"/>
                    <input type="hidden" name="ref" value="frontregister">
                    <input type="submit" class="fadeIn sixth" value="Đăng ký phòng">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForm(showId, hideId) {
        document.getElementById(showId).style.display = 'block';
        document.getElementById(hideId).style.display = 'none';
    }
</script>

@endsection
