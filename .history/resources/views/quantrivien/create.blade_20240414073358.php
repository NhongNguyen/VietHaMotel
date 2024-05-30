@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thêm loại phòng
                                <a href="{{url('admin/loaiphong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/quantrivien')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Họ quản trị viên</th>
                                            <td><input name="hoQTV" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tên quản trị viên</th>
                                            <td><input name="tenQTV" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tài khoản (Số điện thoại)</th>
                                            <td>
                                                <input type="text" pattern="[0-9]{8,10}" minlength="8" maxlength="10" name="SDT" class="form-control" required placeholder="Tài khoản phải là số và có từ 8 đến 10 số" title="Tài khoản phải là số và có từ 8 đến 10 chữ số">
                                            </td>                                        </tr>
                                        <tr>
                                            <th>Mật khẩu</th>
                                            <td>
                                                <input name="matKhau" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" placeholder="Mật khẩu (ít nhất 8 ký tự, chứa ít nhất một chữ cái và một số) title="Mật khẩu phải chứa ít nhất một chữ cái và một số, và có ít nhất 8 ký tự" required />
                                            </td>
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