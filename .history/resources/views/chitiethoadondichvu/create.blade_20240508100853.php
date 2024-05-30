@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn và dịch vụ
                <a href="{{url('admin/chitiethoadondichvu')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                <form enctype="multipart/form-data" method="post" action="{{url('admin/chitiethoadondichvu')}}">
                    @csrf
                    <table class="table table-bordered" >
                        <tr>
                            <th>Chọn chi tiết hóa đơn</th>
                            <td>
                                <select name="id_chi_tiet_hoa_don" class="form-control">
                                    <option value="0">--- Chọn ---</option>
                                    @foreach($chitiethoadons as $chitiethoadon)
                                        <option value="{{$chitiethoadon->id}}">{{$chitiethoadon->hoadons->phongtros->tenPhong}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Chọn dịch vụ</th>
                            <td>
                                <table>
                                    <tr>
                                        <th>Số Trước</th>
                                        <th>Số Hiện Tại</th>
                                    </tr>
                                    @foreach($dichvus as $dichvu)
                                        <tr>
                                            <td>
                                                <input type="text" name="soTruoc[]" class="form-control" required>
                                            </td>
                                            <td>
                                                <input type="text" name="soHienTai[]" class="form-control" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="checkbox" name="id_dich_vu[]" value="{{$dichvu->id}}">
                                                <label>{{$dichvu->tenDichVu}}</label><br>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" value="Chấp nhận"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
    // Nghe sự kiện click vào checkbox
    $('input[type="checkbox"]').click(function(){
        // Nếu checkbox được chọn
        if($(this).prop("checked") == true){
            // Hiển thị hàng chứa các trường "Số Trước" và "Số Hiện Tại" liên quan
            $(this).closest('tr').next('tr').show();
        }
        // Nếu checkbox không được chọn
        else if($(this).prop("checked") == false){
            // Ẩn đi hàng chứa các trường "Số Trước" và "Số Hiện Tại" liên quan
            $(this).closest('tr').next('tr').hide();
        }
    });
    $(document).ready(function(){
    // Mã JavaScript ở đây
});
</script>

@endsection
