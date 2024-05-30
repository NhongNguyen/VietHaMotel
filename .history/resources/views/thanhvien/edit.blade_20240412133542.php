@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cập nhật {{$data->tenThanhVien}}
                                <a href="{{url('admin/thanhvien')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/thanhvien/'.$data->id)}}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Họ thành viên</th>
                                            <td><input value="{{$data->hoThanhVien}}" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tên thành viên</th>
                                            <td><input value="{{$data->tenThanhVien}}" type="number" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>CCCD mặt trước<span class="text-danger">*</span></th>
                                            <td><input   value="{{$data->CCCDtruoc}}" multiple type="file"/></td>
                                        </tr>
                                        <tr>
                                            <th>CCCD mặt sau<span class="text-danger">*</span></th>
                                            <td><input value="{{$data->CCCDsau}}" multiple type="file" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" value="Chấp nhận"/>
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@section('scripts')
@endsection

@endsection