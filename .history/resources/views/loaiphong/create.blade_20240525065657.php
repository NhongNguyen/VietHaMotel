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
                <form enctype="multipart/form-data" method="post" action="{{url('admin/loaiphong')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Tên loại phòng</th>
                            <td><input name="tenLoaiPhong" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Đơn giá</th>
                            <td><input name="donGia" id="donGia" type="text" class="form-control" /></td>
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

<!-- JavaScript for formatting currency -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var donGiaInput = document.getElementById('donGia');

        donGiaInput.addEventListener('input', function() {
            var value = this.value.replace(/,/g, ''); // Remove commas
            if (!isNaN(value) && value.length > 0) {
                this.value = Number(value).toLocaleString('en'); // Add commas
            } else {
                this.value = value;
            }
        });
    });
</script>

@endsection
