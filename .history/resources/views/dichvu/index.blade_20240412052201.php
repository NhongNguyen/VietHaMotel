@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Loại phòng
                                <a href="{{url('admin/dichvu/create')}}" class="float-right btn btn-success btn-sm">Thêm mới</a>
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
                                            <th>Tên loại phòng</th>
                                            <th>Đơn giá</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên loại phòng</th>
                                            <th>Đơn giá</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($data)
                                            @foreach($data as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->tenDichVu}}</td>
                                                <td>{{$d->giaDichVu}}</td>
                                                <td>{{$d->moTa}}</td>
                                                <td>
                                                    <a href="{{url('admin/dichvu/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('admin/dichvu/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Bạn đã chắc chắn xóa dữ liệu này chưa?')" href="{{url('admin/dichvu/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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