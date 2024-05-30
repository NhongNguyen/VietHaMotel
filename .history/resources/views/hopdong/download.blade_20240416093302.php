<!-- resources/views/download.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Details</title>
</head>
<body>
    <h2>Contract Details</h2>
    <p>ID: {{ $data->id }}</p>
    <p>Tên phòng trọ: {{ $data->phongtros->tenPhong }}</p>
    <p>Tên khách thuê: {{ $data->khachthues->tenKhach }}</p>
    <p>Giá đặt cọc: {{ $data->giaDatCoc }}</p>
    <p>Ngày bắt đầu: {{ date('d/m/Y', strtotime($data->ngayBatDau)) }}</p>
    <p>Ngày kết thúc: {{ date('d/m/Y', strtotime($data->ngayKetThuc)) }}</p>
</body>
</html>
