@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thêm hóa đơn
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
                                                    @foreach($hoadons as $hoadon)
                                                    <option value="{{$rt->id}}">{{$rt->tenLoaiPhong}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Số ngày thuê</th>
                                            <td><input name="soNgayThue" type="number"></td>
                                        </tr>
                                        <tr>
                                            <th>Đã thành toán</th>
                                            <td>
                                                <select name="tinhTrang" class="form-control">
                                                    <option value="Đã thanh toán" style="color:green">Đã thanh toán</option>
                                                    <option value="Chưa thanh toán" style="color:red">Chưa thanh toán</option>                                                         
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ngày lập hóa đơn</th>
                                            <td><input name="ngayLapHoaDon" type="date" class="form-control" /></td>
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