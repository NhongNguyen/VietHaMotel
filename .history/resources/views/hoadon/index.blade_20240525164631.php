@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn</h6>
            <input type="text" id="searchInput" class="form-control" style="margin-top:20px;" placeholder="Tìm kiếm hóa đơn...">
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="text-danger">{{ session('error') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Phòng</th>
                            <th>Ngày xuất</th>
                            <th>Tổng tiền</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên Phòng</th>
                            <th>Ngày xuất</th>
                            <th>Tổng tiền</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ $d->phongtros->tenPhong }}</td>
                            <td>{{ date('H:m:s d/m/Y', strtotime($d->ngayXuat)) }}</td>
                            <td>{{ $d->tongTien }}</td>
                            <td>
                                <a href="{{ route('createChiTietHoaDon', ['id' => $d->id]) }}" class="btn btn-primary btn-sm">Tạo Chi Tiết Hóa Đơn</a>
                                <a href="{{ url('admin/hoadon/'.$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('scripts')
<script>
    // Lấy ngày hiện tại
    var currentDate = new Date();
    // Vòng lặp qua tất cả các dòng trong bảng
    $("#dataTable tbody tr").each(function() {
        // Lấy ngày xuất của hóa đơn từ cột thứ 3
        var dateString = $(this).find("td:eq(2)").text();
        // Chuyển đổi ngày xuất thành đối tượng Date
        var billDate = new Date(dateString);
        // Tính số ngày giữa ngày hiện tại và ngày xuất của hóa đơn
        var diffDays = Math.ceil((billDate - currentDate) / (1000 * 60 * 60 * 24));
        // Nếu số ngày là 10, hiển thị thông báo
        if (diffDays === 10) {
            $(this).append('<td><span class="badge badge-warning">Còn 10 ngày nữa sẽ tạo chi tiết hóa đơn</span></td>');
        }
    });
    $(document).ready(function(){
            $('#searchInput').on('keyup', function(){
                var value = $(this).val().toLowerCase();
                $('#dataTable tbody tr').filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
</script>
@endsection
