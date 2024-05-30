@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thêm phòng
                                <a href="{{url('admin/phongtros')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                                <form method="post" action="{{url('admin/phongtros')}}" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Chọn loại phòng trọ</th>
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
                                            <th>Ảnh đại diện<span class="text-danger">*</span></th>
                                            <td><input name="hinhAnhDaiDien" type="file"/></td>
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
                <script>
    function validateForm() {
        var fileInput = document.getElementById('hinhAnhDaiDien');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Chỉ chấp nhận các định dạng hình ảnh: .jpg, .jpeg, .png, .gif');
            fileInput.value = '';
            return false;
        }
        
        var fileSize = fileInput.files[0].size;
        var maxSize = 2048 * 1024; // 2048 KB

        if (fileSize > maxSize) {
            alert('Kích thước của hình ảnh không được vượt quá 2048 KB');
            fileInput.value = '';
            return false;
        }

        return true;
    }
</script>
                <!-- /.container-fluid -->

@endsection