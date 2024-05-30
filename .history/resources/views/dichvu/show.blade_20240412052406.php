@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$data->tenDichVu}}
                                <a href="{{url('admin/loaiphong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>Tên dịch vụ</th>
                                        <td>{{$data->tenLoaiPhong}}</td>
                                    </tr>
                                    <tr>
                                        <th>Giá dịch vụ</th>
                                        <td>{{$data->giaDichVu}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mô tả</th>
                                        <td>{{$data->moTa}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection