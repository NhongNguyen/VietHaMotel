@extends('frontlayout')

@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
        <h1>Thông tin phòng trọ</h1>
        @if(isset($phongTro))
            <p>Tên phòng: {{ $phongTro->tenPhong }}</p>
            <p>Mô tả: {{ $phongTro->moTa }}</p>
            <p>Tình trạng: {{ $phongTro->tinhTrang }}</p>
            <!-- Hiển thị các thông tin khác về phòng trọ -->

            <!-- Hiển thị thông tin hợp đồng -->
            <h2>Thông tin hợp đồng</h2>
            @if(isset($hopDong))
                <p>Ngày bắt đầu: {{ $hopDong->ngayBatDau }}</p>
                <p>Ngày kết thúc: {{ $hopDong->ngayKetThuc }}</p>
                <p>Gia đặt cọc: {{ $hopDong->giaDatCoc }}</p>
                <!-- Hiển thị các thông tin khác về hợp đồng -->
            @else
                <p>Không có thông tin về hợp đồng.</p>
            @endif
        @else
            <p>Không có thông tin về phòng trọ.</p>
        @endif
    </div>
@endsection
