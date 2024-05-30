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
            <p>Tình trạng: {{ $phongTro->tinhTrang }}</p>
            <!-- Hiển thị các thông tin khác về phòng trọ -->

            <!-- Hiển thị thông tin hợp đồng -->
            <h1>Thông tin hợp đồng</h1>
            @if(isset($hopDong))
                <p>Ngày bắt đầu: {{ $hopDong->ngayBatDau }}</p>
                <p>Ngày kết thúc: {{ $hopDong->ngayKetThuc }}</p>
                <p>Gia đặt cọc: {{ $hopDong->giaDatCoc }}</p>
                <!-- Hiển thị các thông tin khác về hợp đồng -->
                <td>
                                    <a href="{{ route('hopdong.view-pdf', ['id' => $d->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <!-- <a href="{{url('admin/hopdong/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> -->
                                    <a onclick="return confirm('Bạn đã chắc chắn muốn xóa dữ liệu này không?')" href="{{url('admin/hopdong/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                                <td> <!-- Thêm cột mới cho liên kết tải PDF -->
                                   <a href="{{ route('hopdong.pdf', ['id' => $d->id]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i> Tải xuống</a>
                               </td>
            @else
                <p>Không có thông tin về hợp đồng.</p>
            @endif
        @else
            <p>Không có thông tin về phòng trọ.</p>
        @endif
    </div>
    @endsection
@endif
