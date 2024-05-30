@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách hóa đơn
                
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
                            <td>{{$d->id}}</td>
                            <td>{{$d->phongtros->tenPhong}}</td>
                            <td>{{ date('H:m:s d/m/Y', strtotime($d->ngayXuat)) }}</td>
                            <td>{{$d->tongTien}}</td>
                            <td>
    @php
        // Lấy ngày cuối của tháng
        $lastDayOfMonth = Carbon\Carbon::now()->endOfMonth();
        
        // Xác định số ngày cần nhắc hẹn trước khi ngày cuối của tháng
        $reminderDays = 20; // Đặt số ngày nhắc hẹn ở đây, ví dụ: 3 ngày
        
        // So sánh ngày hiện tại với ngày cuối của tháng
        if (Carbon\Carbon::now()->eq($lastDayOfMonth) || Carbon\Carbon::now()->addDays($reminderDays)->eq($lastDayOfMonth)) {
            // Nếu là ngày cuối của tháng hoặc số ngày nhắc hẹn trước đó, hiển thị nút "Tạo Chi Tiết Hóa Đơn"
            echo '<a href="'.route('createChiTietHoaDon', ['id' => $d->id]).'" class="btn btn-primary btn-sm">Tạo Chi Tiết Hóa Đơn</a>';
        }
    @endphp
    <a href="{{url('admin/hoadon/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
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
    

<!-- Custom styles for this page -->
<link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>

@endsection
