@if(isset($showContent) && $showContent == false)
    <!-- Không hiển thị nội dung -->
@else
    @extends('frontlayout')

    @section('content')
        <!-- Hiển thị nội dung -->
        <div class="container">
            <h1>Thông tin phòng trọ</h1>
            @if(isset($phongTro))
                <p>Tên phòng: {{ $phongTro->tenPhong }}</p>
                <p>Mô tả: {{ $phongTro->moTa }}</p>
                <!-- Hiển thị các thông tin khác về phòng trọ -->

                <!-- Hiển thị thông tin hợp đồng -->
                <h1>Thông tin hợp đồng</h1>
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

                <!-- Hiển thị chi tiết hóa đơn -->
                <h1>Chi tiết hóa đơn</h1>
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
                                        <td>{{ $chiTiet->daThanhToan }}</td>
                                        <td>{{ $chiTiet->thanhTien }}</td>
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

            @else
                <p>Không có thông tin về phòng trọ.</p>
            @endif
        </div>
        <style>
            h1{
                
            }
    .table {
        margin-top: 20px;
    }
    .table th, .table td {
        text-align: center;
    }
    .thead-dark th {
        background-color: #343a40;
        color: white;
    }
</style>

    @endsection
@endif
