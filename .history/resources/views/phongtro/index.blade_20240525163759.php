@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Phòng trọ
            
                <a href="{{url('admin/phongtros/create')}}" class="float-right btn btn-success btn-sm">Thêm mới</a>
            </h6>
            <input type="text" id="searchInput" class="form-control mt-2" placeholder="Tìm kiếm tên phòng, loại phòng, tên khách...">
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
                            <th>#</th>
                            <th>loại phòng</th>
                            <th>Tên phòng trọ</th>
                            <th>Tên - Họ khách thuê</th>
                            <th>Tên - Họ thành viên</th>
                            <th>Tình trạng</th>
                            <th>Ảnh đại diện</th>
                            <th>Danh sách ảnh</th> <!-- Thêm cột danh sách ảnh -->
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>loại phòng</th>
                            <th>Tên phòng trọ</th>
                            <th>Tên - Họ khách thuê</th>
                            <th>Tên - Họ thành viên</th>
                            <th>Tình trạng</th>
                            <th>Ảnh đại diện</th>
                            <th>Danh sách ảnh</th> <!-- Thêm cột danh sách ảnh -->
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->loaiphongs->tenLoaiPhong}}</td>
                            <td>{{$d->tenPhong}}</td>
                            <td>
                                @if($d->khachthues)
                                {{$d->khachthues->tenKhach}} - {{$d->khachthues->hoKhach}}
                                @else
                                <span style="color:red">Không có thông tin</span>
                                @endif
                            </td>
                            <td>
                                @if($d->thanhviens)
                                {{$d->thanhviens->tenThanhVien}} - {{$d->thanhviens->hoThanhVien}}
                                @else
                                <span style="color:red">Không có thông tin</span>
                                @endif
                            </td>
                            <td>
                                @if($d->khachthues)
                                <span style="color:red">Hết phòng</span>
                                @else
                                <span style="color:green">Còn trống</span>
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('storage/'.$d->hinhAnhDaiDien) }}" style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <!-- Hiển thị danh sách ảnh -->
                                @foreach($d->hinhAnhPhongTros as $image)
                                    <img src="{{ asset('storage/'.$image->srcHinhAnh) }}" style="width: 50px; height: auto;">
                                @endforeach
                            </td>
                            <td>{{$d->moTa}}</td>
                            <td>
                                <a href="{{url('admin/phongtros/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{url('admin/phongtros/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Bạn đã chắc chắn muốn xóa dữ liệu này ?')" href="{{url('admin/phongtros/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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


@section('scripts')
<!-- Custom styles for this page -->
<link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script>
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

@endsection
