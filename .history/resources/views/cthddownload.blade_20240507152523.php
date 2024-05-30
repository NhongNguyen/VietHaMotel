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
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Chi tiết hóa đơn</h2>
        <div class="section">
            <p class="section-title">Thông tin hóa đơn</p>
            <div class="section-content">
                <p><strong>Số hóa đơn:</strong> {{ $chiTietHoaDon->id }}</p>
                <p><strong>Ngày lập hóa đơn:</strong> {{ date('d/m/Y', strtotime($chiTietHoaDon->ngayLapHoaDon)) }}</p>
            </div>
        </div>
        <div class="section">
            <p class="section-title">Thông tin chi tiết</p>
            <div class="section-content">
                <p><strong>Số ngày thuê:</strong> {{ $chiTietHoaDon->soNgayThue }}</p>
                <p><strong>Đã thanh toán:</strong> {{ $chiTietHoaDon->daThanhToan ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                <p><strong>Thành tiền:</strong> {{ number_format($chiTietHoaDon->thanhTien, 0, ',', '.') }} đ</p>
            </div>
        </div>
    </div>
</body>
</html>
