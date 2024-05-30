@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm phòng
                <a href="{{url('admin/hopdong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên phòng trọ</th>
                        <td>
                            @if($data)
                                {{$data->tenPhong}}
                            @else
                                Không có dữ liệu nào tồn tại.
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
