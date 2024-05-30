@extends('layout')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn</h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Hóa đơn</th>
                            <th>Số ngày thuê</th>
                            <th>Đã thanh toán</th>
                            <th>Thành tiền</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>ID Hóa đơn</th>
                            <th>Số ngày thuê</th>
                            <th>Đã thanh toán</th>
                            <th>Thành tiền</th>
                            <th>Ngày lập hóa đơn</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->hoadons->phongtros->tenPhong}}</td>
                                    <td>{{$d->soNgayThue}}</td>
                                    <td>
                                        <form action="{{ route('chitiethoadon.updatePaymentStatus', $d->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="daThanhToan" onchange="this.form.submit()">
                                                <option value="Chưa" {{ $d->daThanhToan == 'Chưa' ? 'selected' : '' }}>Chưa thanh toán</option>
                                                <option value="Đã" {{ $d->daThanhToan == 'Đã' ? 'selected' : '' }}>Đã thanh toán</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{$d->thanhTien}}</td>
                                    <td>{{ date('H:m:s d/m/Y', strtotime($d->ngayLapHoaDon)) }}</td>
                                    <td>
                                        <a href="{{ route('hoadon.view-cthd-pdf', ['id' => $d->id]) }}" class="btn btn-info btn-sm">Hóa đơn thanh toán</a>
                                        <a href="{{url('admin/chitiethoadondichvu/'.$d->id).'/view'}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
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
<style>
    .payment-status-form select {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #f8f9fa; /* Default background color */
        transition: background-color 0.3s;
    }

    .payment-status-form select.pending {
        background-color: #e0e0e0; /* Gray color for "Chưa thanh toán" */
        color: #000;
    }

    .payment-status-form select.paid {
        background-color: #c8e6c9; /* Green color for "Đã thanh toán" */
        color: #000;
    }
</style>

@section('scripts')
<!-- Custom styles for this page -->
<link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>

@endsection

@endsection
