@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách hợp đồng
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
                            <th>#</th>
                            <th>Tên phòng trọ</th>
                            <th>Họ tên khách thuê</th>
                            <th>Giá đặt cọc</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tên phòng trọ</th>
                            <th>Họ tên khách thuê</th>
                            <th>Giá đặt cọc</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>
                                    @if($d->phongtros)
                                        {{$d->phongtros->tenPhong}}
                                    @endif
                                </td>
                                <td>
                                    @if($d->khachthues)
                                        {{$d->khachthues->tenKhach}}
                                    @endif
                                </td>
                                <td>{{$d->giaDatCoc}}</td>
                                <td>{{ date('d/m/Y', strtotime($d->ngayBatDau)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($d->ngayKetThuc)) }}</td>
                                <td>
                                    <a href="{{ route('hopdong.view-pdf', ['id' => $d->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <!-- <a href="{{url('admin/hopdong/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> -->
                                    <a onclick="return confirm('Bạn đã chắc chắn muốn xóa dữ liệu này không?')" href="{{url('admin/hopdong/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                                <td> <!-- Thêm cột mới cho liên kết tải PDF -->
                                   <a href="{{ route('hopdong.pdf', ['id' => $d->id]) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i> Tải xuống</a>
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
