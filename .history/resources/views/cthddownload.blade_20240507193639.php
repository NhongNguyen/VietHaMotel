<!-- Trong file cthddownload.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <!-- CSS styles -->
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
                <p><strong>Tên khách:</strong> {{ $khachThue->ten }}</p>
                <p><strong>Tên phòng:</strong> {{ $phongTro->ten }}</p>
                <!-- Các thông tin khác -->
                <p><strong>Số ngày thuê:</strong> {{ $chiTietHoaDon->soNgayThue }}</p>
                <p><strong>Đã thanh toán:</strong> {{ $chiTietHoaDon->daThanhToan ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                <p><strong>Thành tiền:</strong> {{ number_format($chiTietHoaDon->thanhTien, 0, ',', '.') }} đ</p>
            </div>
        </div>
    </div>
</body>
</html>
