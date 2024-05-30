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
                                        <form class="payment-status-form" action="{{ route('chitiethoadon.updatePaymentStatus', $d->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="toggle-switch">
                                                <input type="checkbox" id="toggle{{ $d->id }}" name="daThanhToan" class="toggle-input" {{ $d->daThanhToan == 'Đã' ? 'checked' : '' }}>
                                                <label for="toggle{{ $d->id }}" class="slider"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{$d->thanhTien}}</td>
                                    <td>{{ date('H:i:s d/m/Y', strtotime($d->ngayLapHoaDon)) }}</td>
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
    .toggle-switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.toggle-input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

.toggle-input:checked + .slider {
    background-color: #4CAF50;
}

.toggle-input:checked + .slider:before {
    transform: translateX(26px);
}

</style>

@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var selects = document.querySelectorAll('.payment-status-form select');

    selects.forEach(function (select) {
        // Initialize the select element with the correct class
        updateSelectClass(select);

        // Add event listener for change event
        select.addEventListener('change', function () {
            updateSelectClass(select);
        });
    });

    function updateSelectClass(select) {
        if (select.value === 'Chưa') {
            select.classList.add('pending');
            select.classList.remove('paid');
        } else if (select.value === 'Đã') {
            select.classList.add('paid');
            select.classList.remove('pending');
        }
    }
});

</script>

@endsection

@endsection
