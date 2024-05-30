@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thêm loại phòng
                                <a href="{{url('admin/dichvu')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/dichvu')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Tên dịch vụ</th>
                                            <td><input name="tenDichVu" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Đơn giá</th>
                                            <td><input name="giaDichVu" type="number" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Mô tả</th>
                                            <td><textarea name="moTa" class="form-control"></textarea></td>
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