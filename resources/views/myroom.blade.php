@extends('frontlayout')

@section('content')
@if(isset($showContent) && $showContent == false)
    <div class="container" style="margin-top:10px">
        @if(isset($khachThue))
            <div class="card mb-4 mt-4">
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
        <!-- Hiển thị nội dung -->
        <div class="container">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h1 class="pb-2">Thông tin thanh toán</h1>
                </div>
                <div class="card-body">
                    <div>STK: 7440125921628</div>
                    <div>Người nhận: NGUYEN VIET HA</div>
                    <div>Ngân hàng: MB_Ngân hàng Quân đội</div>
                    <div>Mã QR:<br>
                        <img src="{{ asset('img/maqr.jpg')}}">
                    </div>
                </div>
            </div>
            @if(isset($khachThue))
            <div class="card mb-4 mt-4">
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
            
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h1 class="pb-2">Thông tin thành viên</h1>
                </div>
                <div class="card-body">
                    @if(isset($thanhVien))
                        <p>Họ tên thành viên:{{ $thanhVien->hoThanhVien }} {{ $thanhVien->tenThanhVien }}</p>
                        <!-- Hiển thị các thông tin khác về phòng trọ -->
                    @else
                        <p>Không có thông tin về thành viên.</p>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="pb-2">Thông tin phòng trọ</h1>
                </div>
                <div class="card-body">
                    @if(isset($phongTro))
                        <p>Tên phòng: {{ $phongTro->tenPhong }}</p>
                        <p>Mô tả: {{ $phongTro->moTa }}</p>
                        <!-- Hiển thị các thông tin khác về phòng trọ -->
                    @else
                        <p>Không có thông tin về phòng trọ.</p>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="pb-2">Thông tin hợp đồng</h1>
                </div>
                <div class="card-body">
                    @if(isset($hopDong))
                        <p>Ngày bắt đầu: {{ date('d/m/Y', strtotime($hopDong->ngayBatDau))}}</p>
                        <p>Ngày kết thúc: {{ date('d/m/Y', strtotime($hopDong->ngayKetThuc))}}</p>
                        <p>Giá đặt cọc: {{ $hopDong->giaDatCoc }}</p>
                        <!-- Hiển thị các thông tin khác về hợp đồng -->

                        <a href="{{ route('hopdong.view-pdf', ['id' => $hopDong->id]) }}" class="btn btn-info btn-sm">Xem hợp đồng</a>

                        <a href="{{ route('hopdong.pdf', ['id' => $hopDong->id]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i> Tải xuống</a>
                    @else
                        <p>Không có thông tin về hợp đồng.</p>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="pb-2">Chi tiết hóa đơn</h1>
                </div>
                <div class="card-body">
                    @if(isset($chiTietHoaDon) && count($chiTietHoaDon) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Số ngày thuê</th>
                                        <th>Đã thanh toán</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chiTietHoaDon as $chiTiet)
                                        <tr>
                                            <td>{{ $chiTiet->soNgayThue }}</td>
                                            <td> @if($chiTiet->thanhTien  == "Đã")Đã thanh toán
                                                 @else
                                                 Chưa thanh toán
                                                @endif</td>
                                            
                                            <td>{{$chiTiet->thanhTien }}</td>
                                            <td>
                                                <a href="{{ route('hoadon.view-cthd-pdf', ['id' => $chiTiet->id]) }}" class="btn btn-info btn-sm">Hóa đơn thanh toán</a>                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Không có thông tin chi tiết về hóa đơn.</p>
                    @endif
                </div>
            </div>
        </div>
    @endsection
@endif
