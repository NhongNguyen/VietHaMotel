@extends('frontlayout')

@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
        <h1>Thông tin phòng trọ</h1>
        @if(isset($phongTro))
            <table class="info-table">
                <tr>
                    <th>Tên phòng</th>
                    <td>{{ $phongTro->tenPhong }}</td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td>{{ $phongTro->moTa }}</td>
                </tr>
                <tr>
                    <th>Tình trạng</th>
                    <td>{{ $phongTro->tinhTrang }}</td>
                </tr>
                <!-- Hiển thị các thông tin khác về phòng trọ -->

                <!-- Hiển thị thông tin hợp đồng -->
                <tr>
                    <th colspan="2">Thông tin hợp đồng</th>
                </tr>
                @if(isset($hopDong))
                    <tr>
                        <th>Ngày bắt đầu</th>
                        <td>{{ $hopDong->ngayBatDau }}</td>
                    </tr>
                    <tr>
                        <th>Ngày kết thúc</th>
                        <td>{{ $hopDong->ngayKetThuc }}</td>
                    </tr>
                    <tr>
                        <th>Gia đặt cọc</th>
                        <td>{{ $hopDong->giaDatCoc }}</td>
                    </tr>
                    <!-- Hiển thị các thông tin khác về hợp đồng -->
                @else
                    <tr>
                        <td colspan="2">Không có thông tin về hợp đồng.</td>
                    </tr>
                @endif
            </table>
        @else
            <p>Không có thông tin về phòng trọ.</p>
        @endif
    </div>
@endsection

<style>
    .info-table {
        width: 100%;
        border-collapse: collapse;
    }

    .info-table th,
    .info-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .info-table th {
        background-color: #f2f2f2;
    }
</style>
