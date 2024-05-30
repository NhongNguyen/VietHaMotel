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
            margin-top:-10px;
        }
        h5{
            
        }
        p {
            font-size: 10px;
        }
        .section{
            margin-top:-10px;
        }
        .section-title{
            text-align: center;
        }
        .section-content{
            text-align:right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>VIỆT HÀ</h2>
        <h5 >110/1 Nguyễn Đình Chiều, phường Vĩnh Phước, thành phố Nha Trang, tỉnh Khánh Hòa</h5>
        <div class="section">
            <p class="section-title">Phiếu thanh toán</p>
            <div class="section-content">
                <p><strong>Số hóa đơn:</strong> {{ $chiTietHoaDon->id }}</p>
                <p><strong>Ngày lập hóa đơn:</strong> {{ date('d/m/Y', strtotime($chiTietHoaDon->ngayLapHoaDon)) }}</p>
            </div>
            <div>
                <p><strong>Số ngày thuê:</strong> {{ $chiTietHoaDon->soNgayThue }}</p>
                <p><strong>Đã thanh toán:</strong> {{ $chiTietHoaDon->daThanhToan ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                <p><strong>Thành tiền:</strong> {{ number_format($chiTietHoaDon->thanhTien, 0, ',', '.') }} đ</p>
            </div>
        </div>
    </div>
</body>
</html>
