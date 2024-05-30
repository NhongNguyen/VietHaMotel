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
                            <td>{{$d->ngayXuat}}</td>
                            <td>{{$d->tongTien}}</td>
                            <td>
                                <form id="autoCreateChiTietForm" action="{{ route('hoadon.autoCreateChiTiet', ['id' => $d->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Tạo chi tiết hóa đơn</button>
                                </form> 
                                <a href="{{url('admin/hoadon/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <!-- Thêm các nút chỉnh sửa và xóa tương tự như trong mẫu code -->
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
