@extends('frontlayout')

@section('content')
  
    <div class="container">
    <div class="sidebar">
        <ul>
            <li><a href="#phong-tro">Thông tin phòng trọ</a></li>
            <li><a href="#hop-dong">Thông tin hợp đồng</a></li>
            <li><a href="#khach-thue">Thông tin khách thuê</a></li>
            <li><a href="#lich-su-thanh-toan">Lịch sử thanh toán</a></li>
        </ul>
    </div>
    </div>
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
          <!-- Sidebar -->
   
        <h1 id="phong-tro">Thông tin phòng trọ</h1>
        @if(isset($phongTro))
            <p>Tên phòng: {{ $phongTro->tenPhong }}</p>
            <p>Mô tả: {{ $phongTro->moTa }}</p>
            <p>Tình trạng: {{ $phongTro->tinhTrang }}</p>
            <!-- Hiển thị các thông tin khác về phòng trọ -->
        @else
            <p>Không có thông tin về phòng trọ.</p>
        @endif
    </div>

    <!-- Hiển thị thông tin hợp đồng -->
    <div class="container">
        <h1 id="hop-dong">Thông tin hợp đồng</h1>
        @if(isset($hopDong))
            <p>Ngày bắt đầu: {{ $hopDong->ngayBatDau }}</p>
            <p>Ngày kết thúc: {{ $hopDong->ngayKetThuc }}</p>
            <p>Gia đặt cọc: {{ $hopDong->giaDatCoc }}</p>
            <!-- Hiển thị các thông tin khác về hợp đồng -->
        @else
            <p>Không có thông tin về hợp đồng.</p>
        @endif
    </div>

    <!-- Thêm phần hiển thị thông tin khách thuê và lịch sử thanh toán tại đây -->

    <!-- CSS -->
    <style>
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            margin-left:15%;
            background-color: #f2f2f2;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 8px 16px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
        }

        .container {
            margin-left: 220px;
        }
    </style>
@endsection
