@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm khách thuê
                <a href="{{url('admin/hinhanhphongtro')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                <form method="post" enctype="multipart/form-data" action="{{url('admin/hinhanhphongtro')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Chọn phòng trọ</th>
                            <td>
                                <select name="rt_id" class="form-control">
                                    <option value="0">--- Chọn ---</option>
                                    @foreach($loaiphongs as $rt)
                                    <option value="{{$rt->id}}">{{$rt->tenLoaiPhong}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Ảnh đại diện</th>
                            <td><input name="srcHinhAnh[]" type="file" multiple /></td>
                        </tr>
                        <tr>

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
