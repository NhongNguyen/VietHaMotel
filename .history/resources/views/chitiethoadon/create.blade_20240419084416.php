@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn
                                <a href="{{url('admin/chitiethoadon')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            @if(Session::has('error'))
                            <p class="text-danger">{{session('error')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{url('admin/chitiethoadon')}}">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Chọn hóa đơn</th>
                                            <td>
                                                <select name="hoadon_id" class="form-control">
                                                    <option value="0">--- Chọn ---</option>
                                                    @foreach($loaiphongs as $rt)
                                                    <option value="{{$rt->id}}">{{$rt->tenLoaiPhong}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Chọn khách thuê</th>
                                            <td>
                                                <select name="cus_id" class="form-control" readonly>
                                                    <option value="0">Tên-Họ</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Chọn thành viên</th>
                                            <td>
                                                <select name="mem_id" class="form-control"  readonly>
                                                    <option value="0">Tên-Họ</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tên phòng</th>
                                            <td><input name="tenPhong" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tình trạng</th>
                                            <td>
                                                <select name="tinhTrang" class="form-control">
                                                    <option value="Còn trống" style="color:red">Còn trống</option>                                                  
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mô tả</th>
                                            <td><input name="moTa" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" value="Chấp nhận" />
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection