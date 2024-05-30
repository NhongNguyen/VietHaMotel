@extends('frontlayout')
@section('content')

<div class="container" style="height:700px;">
    @if(Session::has('error'))
    <p class="text-danger">{{ session('error') }}</p>
    @endif
    @if(Session::has('success'))
    <p class="text-danger">{{ session('success') }}</p>
    @endif
    <div class="wrapper fadeInDown" style="margin-top: -50px;">
        <div id="formContent" style="padding: 20px;">
            <!-- Tabs Titles -->
            <div style="padding-top:10px; color:black;">
                <h2>THÀNH VIÊN</h2>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="nomem" onclick="toggleForm('nomemForm', 'memForm')">
                <label class="form-check-label" for="nomem">Không thành viên</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="mem" onclick="toggleForm('memForm', 'nomemForm')">
                <label class="form-check-label" for="mem">Có thành viên</label>
            </div>
            <div id="nomemForm" style="display: none;">
                <form enctype="multipart/form-data" method="post" action="{{ url('admin/phongtros/'.$phong_id ?? '') }}">
                    @csrf
                    @method('put')
                    <div style="margin-bottom:-30px; color:black;">
                        <h2>ĐĂNG KÝ PHÒNG</h2>
                    </div>
                    <input type="hidden" name="phong_id" value="{{ $phong_id }}">
                    <input type="text" name="rt_id" value="{{ $data->first()->id_loai_phong ?? '' }}" placeholder="ID Loại Phòng">
                    <input type="text" name="tenPhong" value="{{ $data->first()->tenPhong ?? '' }}" placeholder="Tên Phòng">
                    <input type="hidden" name="mem_id" value="0" placeholder="ID Thành Viên">
                    <input type="text" name="cus_id" value="{{ session('khachthuelogin')->id ?? '' }}" placeholder="ID Khách Thuê">
                    <input name="soNamKetThuc" type="number" class="fadeIn second form-control" required min="1" placeholder="Nhập số năm kết thúc hợp đồng"/>
                    <input type="hidden" name="ref" value="firstregister">
                    <input type="submit" class="fadeIn sixth" value="Đăng ký phòng">
                </form>
            </div>
           
        </div>
    </div>
</div>



@endsection
