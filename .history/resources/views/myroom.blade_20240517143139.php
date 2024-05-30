@extends('frontlayout')
@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
        <h1>Thông tin phòng trọ</h1>
        @if(isset($phongTro))
            <p>Tên phòng: {{ $phongTro->tenPhong }}</p>
            <p>Tên phòng: {{ $hopDong-> }}</p>
            <!-- Hiển thị các thông tin khác về phòng trọ -->
        @else
            <p>Không có thông tin về phòng trọ.</p>
        @endif
    </div>
@endsection