@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn
            </h6>
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
                            <th>ID Hóa đơn</th>
                            <th>Số ngày thuê</th>
                            <th>Đã thanh toán</th>
                            <th>Thành tiền</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>ID</th>
                            <th>ID Hóa đơn</th>
                            <th>Số ngày thuê</th>
                            <th>Đã thanh toán</th>
                            <th>Thành tiền</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->hoadons->phongtros->tenPhong}}</td>
                            <td>{{$d->soNgayThue}}</td>
                            <td>@if($d->daThanhToan == 'Đã thanh toán')
                                <span style="color:green">Đã thanh toán</span>
                                @else
                                <span style="color:red">Chưa thanh toán</span>
                                @endif
                                </td>
                            <td>{{$d->thanhTien}}</td>
                            <td>{{ date('H:m:s d/m/Y', strtotime($d->ngayLapHoaDon)) }}</td>
                            <td>
                                    <a href="{{ route('hoadon.view-cthd-pdf', ['id' => $d->id]) }}" class="btn btn-info btn-sm">Hóa đơn thanh toán</a>
                                    <!-- <a href="{{url('admin/hopdong/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> -->
                                    <!-- <a onclick="return confirm('Bạn đã chắc chắn muốn xóa dữ liệu này không?')" href="{{url('admin/hopdong/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                                    <a href="{{url('admin/chitiethoadondichvu/'.$d->id).'/view'}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

                                </td>
                        
                        </tr>
                        @endforeach
                        @endif
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
