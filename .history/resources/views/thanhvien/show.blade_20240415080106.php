@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết thành viên : {{$data->tenThanhVien}}
                                <a href="{{url('admin/thanhvien')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" >
                                    <tr>
                                        <th>Họ thành viên</th>
                                        <td>{{$data->hoThanhVien}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tên thành viên</th>
                                        <td>{{$data->tenThanhVien}}</td>
                                    </tr>
                                    <tr>
                                        <th>CCCD mặt trước</th>
                                        <td>
                                            <img src="{{ asset('../storage/'.$data->CCCDtruoc) }}" style="width: 400px; height: auto;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>CCCD mặt sau</th>
                                        <td>
                                            <img src="{{ asset('storage/'.$data->CCCDsau) }}" style="width: 100px; height: auto;"> 
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection