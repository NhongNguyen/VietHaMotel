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
            font-size: 10px;
        }
        .section{
         
        }
        .section-title{
            text-align: center;
            margin-top:-5px;
        }
        .section-content{
            text-align:right;
        }
        th,td{
            padding: 15px;
            text-align: left;
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
                <p><strong>Số hóa đơn:</strong> {{ $chiTietHoaDon->id_hoa_don }}</p>    
                <p><strong>Phòng trọ:</strong> {{ $phongTro->tenPhong}}</p>    
                <p><strong>Tên khách:</strong> {{ $khachThue->hoKhach}} {{ $khachThue->tenKhach}}</p>    
                <p><strong>Số hóa đơn:</strong> {{ $chiTietHoaDon->id }}</p>
                <p><strong>Ngày lập hóa đơn:</strong> {{ date('d/m/Y', strtotime($chiTietHoaDon->ngayLapHoaDon)) }}</p>
            </div>
            <div>
                <table>
                    <tr>
                        <th>
                            Loại phòng
                        </th>
                        <th>
                            Số lượng
                        </th>
                        <th>
                            Đơn giá
                        </th>
                        <th>
                            Thành tiền
                        </th>
                    </tr>
                    <tr>
                        <td>
    
                        </td>
                        <td>
                        {{ $chiTietHoaDon->soNgayThue }}
                    </td>
                    
                    </tr>
                </table>
               
                <p><strong>Thành tiền:</strong> </p>
            </div>
        </div>
    </div>
</body>
</html>
