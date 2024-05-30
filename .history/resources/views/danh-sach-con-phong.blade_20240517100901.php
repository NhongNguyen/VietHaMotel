@extends('frontlayout')
@section('content')
    <div class="container">
        <h1 class="my-4">Danh sách phòng còn trống</h1>
        <div class="row">
            @foreach($phongtros as $phongtro)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$phongtro->tenPhong}}</h5>
                            <p class="card-text">Loại phòng: {{$phongtro->loaiphongs->tenLoaiPhong}}</p>
                            <p class="card-text">Giá: {{$phongtro->loaiphongs->donGia}} đồng</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection