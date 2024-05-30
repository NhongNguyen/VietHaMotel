@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Chi tiết hợp đồng</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin hợp đồng</h6>
        </div>
        <div class="card-body">
            <!-- Display contract details -->
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Giá đặt cọc:</strong> {{ $hopdong->giaDatCoc }}</p>
                    <p><strong>Ngày bắt đầu:</strong> {{ $hopdong->ngayBatDau }}</p>
                    <p><strong>Ngày kết thúc:</strong> {{ $hopdong->ngayKetThuc }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Download PDF link -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tải xuống hợp đồng PDF</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('hopdong.download', ['id' => $hopdong->id]) }}" class="btn btn-primary">Tải xuống PDF</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
