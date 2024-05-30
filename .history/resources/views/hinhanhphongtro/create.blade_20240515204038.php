@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm hình ảnh phòng trọ
                <a href="{{url('admin/hinhanhphongtro')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="post" action="{{url('admin/hinhanhphongtro')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Chọn phòng trọ</th>
                            <td>
                                <select name="id_phong_tro" class="form-control">
                                    <option value="0">--- Chọn ---</option>
                                    @foreach($phongtros as $phongtro)
                                    <option value="{{$phongtro->id}}">{{$phongtro->tenPhong}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>Q
                            <th>Chọn hình ảnh <span class="text-danger">*</span></th>
                            <td><input name="srcHinhAnh[]" type="file" multiple class="form-control" /></td>
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
