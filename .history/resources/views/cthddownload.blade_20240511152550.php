<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <style>
        @font-face {
            font-family: 'Times-Bold';
            src: url('/fonts/Times-Bold.afm') format('truetype');
            font-weight: bold; /* Đảm bảo rằng trình duyệt hiểu rằng đây là font in đậm */
            /* Điều chỉnh đường dẫn đến tệp font chữ để phản ánh cấu trúc thư mục của bạn */
        }
         body {
            font-family:'times', 'Times';
            margin: 0;
            font-size:9px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin-top:-30px;
        }
        h5{
            margin-top:-10px;
        }
        p {
            font-size: 8px;
            margin-top:-10px;

        }
        
        .section-title{
            text-align: center;
            margin-top:-5px;
            font-size:10px;
        }
        .section-content{
            text-align:left;
        }
        table, td, th {  
            border: 1px solid #ddd;
            margin-bottom:10px;
        }
        td,th{
            text-align: center;
            font-size:6px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>
<body>
    <div>
        <h2>VIỆT HÀ</h2>
        <h5 >Địa chỉ: 110/1 Nguyễn Đình Chiều, phường Vĩnh Phước, thành phố Nha Trang, tỉnh Khánh Hòa</h5>
        <div class="section">
            <p class="section-title">Phiếu thanh toán</p>
            <div class="section-content">
                <p><strong>Số hóa đơn:</strong> {{ $chiTietHoaDon->id }}</p>
                <p><strong>Phòng trọ:</strong> {{ $phongTro->tenPhong}}</p>    
                <p><strong>Tên khách:</strong> {{ $khachThue->hoKhach}} {{ $khachThue->tenKhach}}</p>    
                <p><strong>Ngày lập hóa đơn:</strong> {{ date('d/m/Y', strtotime($chiTietHoaDon->ngayLapHoaDon)) }}</p>
            </div>
            <div>
            <div class="title">PHÒNG TRỌ</div>
                <table>
                    <tr>
                        <th>
                            Tên phòng
                        </th>
                        <th>
                            Loại phòng
                        </th>
                        <th>
                            Số ngày thuê
                        </th>
                        <th>
                            Đơn giá
                        </th>
                        <th>
                            Thành tiền
                        </th>
                    </tr>
                    <tr><td>
                            {{$phongTro->tenPhong}}
                        </td>
                        <td>
                            {{$loaiPhong->tenLoaiPhong}}
                        </td>
                        <td>
                            {{ $chiTietHoaDon->soNgayThue }}
                        </td>
                        <td>
                        {{ number_format($loaiPhong->donGia, 0, ',', '.') }}₫
                        </td>
                        <td>
                        {{ number_format($chiTietHoaDon->thanhTien, 0, ',', '.') }}₫
                        </td>
                </tr>
            </table>
            </div>
            <div>DỊCH VỤ</div>
            <div>
                <table>
                    <tr>
                        <th>
                            Dịch vụ
                        </th>
                        <th>
                            Số trước
                        </th>
                        <th>
                            Số hiện tại
                        </th>
                        <th>
                            Thành tiền 
                        </th>
                    </tr>
                    @if($chiTietHoaDonDichVus)
                        @foreach($chiTietHoaDonDichVus as $d)
                        <tr>
                            <td>{{$d->dichvus->tenDichVu}}</td>
                            <td>{{$d->soTruoc}}</td>
                            <td>{{$d->soHienTai}}</td>
                            <td>{{ number_format($d->thanhTien, 0, ',', '.')}}₫</td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td colspan="3"><strong>Tổng tiền</strong></td>
                            <td colspan="1">
                                @foreach($totalAmounts as $id => $amount)
                                    @foreach($amount as $ngayLapHoaDon => $total)
                                        {{ number_format($total, 0, ',', '.')}}₫
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
            </table>
            </div>
            <div style="display:flex">
                <div style="text-align:left">TỔNG CỘNG</div> 
                <div style="text-align:right">{{ number_format($chiTietHoaDon->thanhTien, 0, ',', '.') + number_format($total, 0, ',', '.')}}₫</div> 
            </div>
            <div>THANH TOÁN</div>
            <div>STK: 7440125921628</div>
            <div>Người nhận: NGUYEN VIET HA</div>
            <div>Ngân hàng: MB_Ngân hàng Quân đội</div>
        </div>
    </div>
</body>
</html>
