@extends('frontlayout')
@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
        <h2>Thông tin phòng trọ</h2>
        @if(isset($phongTro))
            <p>Tên phòng trọ: {{ $phongTro->tenPhong }}</p>
            <!-- Hiển thị các thông tin khác về phòng trọ -->
        @else
            <p>Không có thông tin về phòng trọ.</p>
        @endif
    </div>

    <!-- Hiển thị thông tin về khách thuê -->
    <div class="container">
        @if(isset($phongTro) && $phongTro->khachThues->isNotEmpty())
            <h2>Thông tin khách thuê</h2>
            <p>Họ và tên: {{ $phongTro->khachThues->first()->hoKhach }} {{ $phongTro->khachThues->first()->tenKhach }}</p>
            <!-- Hiển thị các thông tin khác về khách thuê -->
        @else
            <p>Phòng trọ này chưa có khách thuê.</p>
        @endif
    </div>
@endsection