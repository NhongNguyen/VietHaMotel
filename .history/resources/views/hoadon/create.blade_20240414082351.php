@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm hóa đơn
                <a href="{{url('admin/hoadon')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                <form enctype="multipart/form-data" method="post" action="{{url('admin/hoadon')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>ID loại phòng</th>
                            <td><input name="id_loai_phong" type="number" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>ID khách thuê</th>
                            <td><input name="id_khach_thue" type="number" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>ID thành viên</th>
                            <td><input name="id_thanh_vien" type="number" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Tên phòng</th>
                            <td><input name="tenPhong" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Tình trạng</th>
                            <td><input name="tinhTrang" type="text" class="form-control" /></td>
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
