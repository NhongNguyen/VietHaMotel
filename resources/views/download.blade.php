<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hợp đồng thuê phòng trọ</title>
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
            padding: 20px;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align: center;font-size:16px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
        <div style="text-align: center; font-size:16px">Độc lập – Tự do – Hạnh phúc</div>
        <br>
        <div style="text-align: center; font-size:16px">HỢP ĐỒNG THUÊ PHÒNG TRỌ</div>
        <p>Hôm nay ngày {{ date('d', strtotime($hopdong->ngayBatDau)) }} tháng {{ date('m', strtotime($hopdong->ngayBatDau)) }} năm {{ date('Y', strtotime($hopdong->ngayBatDau)) }} 
            <br> Tại địa chỉ: 110/2 Nguyễn Đình Chiều, phường Vĩnh Phước, thành phố Nha Trang, tỉnh Khánh Hòa</p>
        <br>
        <p><strong>Chúng tôi gồm:</strong></p>
        <p>1.Đại diện bên cho thuê phòng trọ (Bên A):</p>
        <p>Ông/bà: Việt Hà Sinh ngày: 29/03/1971</p>
        <p>Nơi đăng ký HK: phường Vĩnh Phước, thành phố Nha Trang, tỉnh Khánh Hòa</p>
        <p>CMND số: 221551302 .cấp ngày 29/03/2000 tại: Công an nhân dân tỉnh Khánh Hòa </p>
        <p>Số điện thoại:0912 305 179</p>
        <br>
        <p>2. Bên thuê phòng trọ (Bên B):</p>
        <p>Ông/bà: {{$khachthues->hoKhach}} {{$khachthues->tenKhach}} &nbsp;&nbsp;&nbsp;&nbsp; Sinh ngày: {{ date('d/m/Y', strtotime($khachthues->ngaySinh)) }} .</p>
        <p>Nơi đăng ký HK thường trú: {{$khachthues->noiThuongTru}}.</p>
        <p>Số CMND: {{$khachthues->soCCCD}}  &nbsp;&nbsp;&nbsp;&nbsp; cấp ngày: {{ date('d/m/Y', strtotime($khachthues->ngayCap)) }}  &nbsp;&nbsp;&nbsp;&nbsp;   tại: {{$khachthues->noiCap}}</p>
        <p>Số điện thoại: {{($khachthues->SDT) }}</p>
        <br>
        <p>Sau khi bàn bạc trên tinh thần dân chủ, hai bên cùng có lợi, cùng thống nhất như sau:</p>
        <p>Bên A đồng ý cho bên B thuê 01 phòng ở tại địa chỉ: 110/2 Nguyễn Đình Chiều, phường Vĩnh Phước, thành phố Nha Trang, tỉnh Khánh Hòa</p>
        <p>Giá thuê: {{ number_format($hopdong->giaDatCoc, 0, ',', '.') }} đ/tháng</p>
        <p>Hình thức thanh toán: tiền mặt</p>
        <p>Tiền điện: tính theo chỉ số công tơ, thanh toán vào cuối các tháng.</p>
        <p>Tiền nước: tính theo chỉ số công tơ, thanh toán vào đầu các tháng.</p>
        <p>Tiền đặt cọc: {{ number_format($hopdong->giaDatCoc, 0, ',', '.') }} đ/tháng</p>
        <p>Hợp đồng có giá trị kể từ {{ date('d', strtotime($hopdong->ngayBatDau)) }} tháng {{ date('m', strtotime($hopdong->ngayBatDau)) }} năm {{ date('Y', strtotime($hopdong->ngayBatDau)) }} đến {{ date('d', strtotime($hopdong->ngayKetThuc)) }} tháng {{ date('m', strtotime($hopdong->ngayKetThuc)) }} năm {{ date('Y', strtotime($hopdong->ngayKetThuc)) }}.</p>
        <br>
        <h3>TRÁCH NHIỆM CỦA CÁC BÊN</h3>
        <p><strong>Trách nhiệm của bên A:</strong></p>
        <ul>
            <li>Tạo mọi điều kiện thuận lợi để bên B thực hiện theo hợp đồng.</li>
            <li>Cung cấp nguồn điện, nước, wifi cho bên B sử dụng.</li>
        </ul>
        <p><strong>Trách nhiệm của bên B:</strong></p>
        <ul>
            <li>Thanh toán đầy đủ các khoản tiền theo đúng thỏa thuận.</li>
            <li>Bảo quản các trang thiết bị và cơ sở vật chất của bên A trang bị cho ban đầu (làm hỏng phải sửa, mất phải đền).</li>
            <li>Không được tự ý sửa chữa, cải tạo cơ sở vật chất khi chưa được sự đồng ý của bên A.</li>
            <li>Giữ gìn vệ sinh trong và ngoài khuôn viên của phòng trọ.</li>
            <li>Bên B phải chấp hành mọi quy định của pháp luật Nhà nước và quy định của địa phương.</li>
            <li>Nếu bên B cho khách ở qua đêm thì phải báo và được sự đồng ý của chủ nhà đồng thời phải chịu trách nhiệm về các hành vi vi phạm pháp luật của khách trong thời gian ở lại.</li>
        </ul>
        <h3>TRÁCH NHIỆM CHUNG</h3>
        <ul>
            <li>Hai bên phải tạo điều kiện cho nhau thực hiện hợp đồng.</li>
            <li>Trong thời gian hợp đồng còn hiệu lực nếu bên nào vi phạm các điều khoản đã thỏa thuận thì bên còn lại có quyền đơn phương chấm dứt hợp đồng; nếu sự vi phạm hợp đồng đó gây tổn thất cho bên bị vi phạm hợp đồng thì bên vi phạm hợp đồng phải bồi thường thiệt hại.</li>
            <li>Một trong hai bên muốn chấm dứt hợp đồng trước thời hạn thì phải báo trước cho bên kia ít nhất 30 ngày và hai bên phải có sự thống nhất.</li>
            <li>Bên A phải trả lại tiền đặt cọc cho bên B.</li>
            <li>Bên nào vi phạm điều khoản chung thì phải chịu trách nhiệm trước pháp luật.</li>
            <li>Hợp đồng được lập thành 02 bản có giá trị pháp lý như nhau, mỗi bên giữ một bản.</li>
        </ul>
        <p> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; ĐẠI DIỆN BÊN B &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;ĐẠI DIỆN BÊN A</p>
    </div>
</body>
</html>
