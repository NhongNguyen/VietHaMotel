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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên hóa đơn</th>
                            <th>Tên phòng trọ</th>
                            <th>Tên dịch vụ</th>
                            <th>Số trước</th>
                            <th>Số hiện tại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post" action="{{url('admin/chitiethoadondichvu')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_chi_tiet_hoa_don" value="{{$id_chi_tiet_hoa_don}}">
                            @foreach($dichvus as $d)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id_dich_vu[]" value="{{$d->id}}">
                                    </td>
                                    <td>
                                        <input type="hidden" name="id_hoa_don" value="{{$id_chi_tiet_hoa_don}}">
                                    </td>
                                    <td>{{$d->tenDichVu}}</td>
                                    <td>
                                        <input type="number" name="soTruoc[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="soHienTai[]" class="form-control">
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <input type="submit" class="btn btn-primary">
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
