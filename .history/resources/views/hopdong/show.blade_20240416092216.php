@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết hợp đồng
                <a href="{{url('admin/hopdong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{$data->id}}</td>
                    </tr>
                    <tr>
                        <th>Tên phòng trọ</th>
                        <td>
                            @if($data->phongtros)
                                {{$data->phongtros->tenPhong}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tên khách thuê</th>
                        <td>
                            @if($data->khachthues)
                                {{$data->khachthues->tenKhach}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Giá đặt cọc</th>
                        <td>{{$data->giaDatCoc}}</td>
                    </tr>
                    <tr>
                        <th>Ngày bắt đầu</th>
                        <td>{{ date('d/m/Y', strtotime($data->ngayBatDau)) }}</td>
                    </tr>
                    <tr>
                        <th>Ngày kết thúc</th>
                        <td>{{ date('d/m/Y', strtotime($data->ngayKetThuc)) }}</td>
                    </tr>
                </table>
                <a href="#" onclick="printdiv()">Print</a>
            </div>
        </div>
    </div>

</div>
<style>
    @media print{
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }
}
/* IE10+ CSS print styles */
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  /* IE10+ CSS print styles go here */
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }
}


</style>
@section('scripts')
@endsection

@endsection
