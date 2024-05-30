@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thêm khách thuê
                                <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                            @endif

                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/customer')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Họ khách thuê <span class="text-danger">*</span></th>
                                            <td><input name="hoKhach" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tên khách thuê<span class="text-danger">*</span></th>
                                            <td><input name="tenKhach" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày sinh <span class="text-danger">*</span></th>
                                            <td><input name="ngaySinh" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Quê quán<span class="text-danger">*</span></th>
                                            <td><input name="queQuan" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Nơi thường trú<span class="text-danger">*</span></th>
                                            <td><input name="noiThuongTru" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày cấp<span class="text-danger">*</span></th>
                                            <td><input name="ngayCap" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Giới tính<span class="text-danger">*</span></th>
                                            <td>
                                                <select name="gioiTinh" class="form-control">
                                                    <option value="Nam">Nam</option>    
                                                    <option value="Nữ">Nữ</option>   
                                                    <option value="Khác">Khác</option>                                               
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tài khoản (Số điện thoại)<span class="text-danger">*</span></th>
                                            <td><input name="SDT" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Mật khẩu<span class="text-danger">*</span></th>
                                            <td><input name="matKhau" type="password" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>CCCD mặt trước<span class="text-danger">*</span></th>
                                            <input   name="CCCDtruoc[]" multiple type="file"/>
                                            <th>CCCD mặt sau<span class="text-danger">*</span></th>
                                            <input name="CCCDsau[]" multiple type="file" />           
                                        </tr>
                                        <tr>
                                            <th>Ảnh đại diện</th>
                                            <td><input name="anhDaiDien[]" multiple type="file" /></td>
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