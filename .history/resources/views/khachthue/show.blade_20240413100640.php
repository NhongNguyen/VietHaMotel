@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Customer
                <a href="{{url('admin/khachthue')}}" class="float-right btn btn-success btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" >
                    <tr>
                        <th>Họ khách</th>
                        <td>{{$data->hoKhach}}</td>
                    </tr>
                    <tr>
                        <th>Tên khách</th>
                        <td>{{$data->tenKhach}}</td>
                    </tr>
                    <tr>
                        <th>Ngày sinh</th>
                        <td>{{$data->ngaySinh}}</td>
                    </tr>
                    <tr>
                        <th>Quê quán</th>
                        <td>{{$data->queQuan}}</td>
                    </tr>
                    <tr>
                        <th>Nơi thường trú</th>
                        <td>{{$data->noiThuongTru}}</td>
                    </tr>
                    <tr>
                        <th>Ngày cấp</th>
                        <td>{{$data->ngayCap}}</td>
                    </tr>
                    <tr>
                        <th>Giới tính</th>
                        <td>{{$data->gioiTinh}}</td>
                    </tr>
                    <tr>
                        <th>Tài khoản (Số điện thoại)</th>
                        <td>{{$data->SDT}}</td>
                    </tr>
                    <tr>
                        <th>Mật khẩu</th>
                        <td>{{$data->matKhau}}</td>
                    </tr>
                    <tr>
                        <th>CCCD mặt trước</th>
                        <td>
                                    <img src="{{ asset('storage/app/'.$d->CCCDtruoc) }}" alt="CCCD mặt trước">
                                </td>
                             
                    </tr>
                    <tr>
                        <th>CCCD mặt sau</th>
                        <td>
                            @foreach($data->CCCDsau as $img)
                                <img width="100" src="{{asset('storage/app/'.$img)}}" />
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Ảnh đại diện</th>
                        <td>
                            @foreach($data->anhDaiDien as $img)
                                <img width="100" src="{{asset('storage/app/'.$img)}}" />
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
