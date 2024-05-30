@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn</h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Số ngày thuê</th>
                            <th>Thanh toán</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Số ngày thuê</th>
                            <th>Thanh toán</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Thành tiền</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($chiTietHoaDons as $chiTiet)
                        <tr>
                            <td>{{ $chiTiet->id }}</td>
                            <td>{{ $chiTiet->soNgayThue }}</td>
                            <td>@if($chiTiet->daThanhToan == 'Đã thanh toán')
                                <span style="color:green">Đã thanh toán</span>
                                @else
                                <span style="color:red">Chưa thanh toán</span>
                                @endif
                                </td>
                                <td>{{ date('H:m:s d/m/Y', strtotime($chiTiet->ngayLapHoaDon)) }}</td>
                            <td>{{ $chiTiet->thanhTien }}</td>
                            <td>
                                    <a href="{{ route('hoadon.view-cthd-pdf', ['id' => $chiTiet->id]) }}" class="btn btn-info btn-sm">Hóa đơn thanh toán</a>
                                    <a href="{{url('admin/hopdong/'.$chiTiet->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-eyes"></i></a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@section('scripts')
<!-- Custom styles for this page -->
<link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>

@endsection

@endsection
