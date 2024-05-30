@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm hóa đơn
            <!-- <form action="{{ route('hoadon.autoCreateChiTiet') }}" method="POST">
                @csrf
                <input type="hidden" name="hoadon_id" value="{{ $hoadon->id }}">
                <button type="submit" class="btn btn-success">Tự động tạo chi tiết hóa đơn</button>
            </form> -->
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
                        <th>ID hóa đơn</th>
                        <td><input name="id_hoa_don" type="number" class="form-control" /></td>
                    </tr>
                    <tr>
                        <th>Số ngày thuê</th>
                        <td><input name="soNgaythue" type="number" class="form-control" /></td>
                    </tr>
                    <tr>
                        <th>Trạng thái thanh toán</th>
                        <td><input name="DaThanhToan" type="text" class="form-control" /></td>
                    </tr>
                    <tr>
                        <th>Ngày lập hóa đơn</th>
                        <td><input name="ngayLapHoaDon" type="date" class="form-control" /></td>
                    </tr>
                    <tr>
                        <th>Thành tiền</th>
                        <td><input name="thanhTien" type="number" class="form-control" /></td>
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
