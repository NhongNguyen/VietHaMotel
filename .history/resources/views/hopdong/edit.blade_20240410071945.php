@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thêm Phòng
                                <a href="{{url('admin/phongtros')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{url('admin/phongtros/'.$data->id)}}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Chọn loại phòng</th>
                                            <td>
                                                <select name="rt_id" class="form-control">
                                                    <option>--- Chọn ---</option>
                                                    @foreach($loaiphongs as $rt)
                                                <option @if($data->id_loai_phong==$rt->id) selected @endif value="{{$rt->id}}">{{$rt->tenLoaiPhong}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Chọn khách thuê</th>
                                            <td>
                                                <select name="rt_id" class="form-control">
                                                    <option value="0">--- Chọn lọc ---</option>
                                                    @foreach($khachthues as $cus)
                                                <option @if($data->id_khach_thue==$cus->id) selected @endif value="{{$cus->id}}">{{$cus->tenKhachThue}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Chọn thành viên</th>
                                            <td>
                                                <select name="rt_id" class="form-control">
                                                    <option value="0">--- Chọn lọc ---</option>
                                                    @foreach($thanhviens as $mem)
                                                <option @if($data->id_thanh_vien==$mem->id) selected @endif value="{{$mem->id}}">{{$mem->tenThanhVien}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tên Phòng</th>
                                            <td><input value="{{$data->tenPhong}}" name="tenPhong" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Tình trạng
                                            </th>
                                            <td>
                                                <select name="tinhTrang" class="form-control">
                                                    <option value="Còn trống">Còn trống</option>    
                                                    <option value="Hết phòng">Hết phòng</option>                                                
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
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