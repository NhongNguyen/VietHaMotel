@extends('frontlayout')

@section('content')
@if(isset($showContent) && $showContent == false)
    <div class="container">
        @if(isset($khachThue))
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="pb-2">Thông tin khách thuê</h1>
                </div>
                <div class="card-body">
                    <p>Họ tên khách: {{ $khachThue->hoKhach }} {{ $khachThue->tenKhach }}</p>
                    <p>Ngày sinh: {{ date('d-m-Y', strtotime($khachThue->ngaySinh))}}</p>
                    <p>Giới tính: {{ $khachThue->gioiTinh }}</p>
                    <p>Quê quán: {{ $khachThue->queQuan }}</p>
                    <p>Nơi thường trú: {{ $khachThue->noiThuongTru }}</p>
                    <p>Số CCCD: {{ $khachThue->soCCCD }}</p>
                    <p>Ngày cấp: {{ date('d-m-Y', strtotime($khachThue->ngayCap))}}</p>
                    <p>Nơi cấp: {{ $khachThue->noiCap }}</p>
                    <p>Số điện thoại: {{ $khachThue->SDT }}</p>
                    <!-- Thêm các thông tin khác về khách thuê nếu cần -->
                </div>
            </div>
        @else
            <p>Không có thông tin về khách thuê.</p>
        @endif
    </div>            
@else
      
    @endsection
@endif
