@extends('frontlayout')

@section('content')

<section class="room-details text-white">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="room-images">
                    <a href="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$data->id}}">
                        <img class="img-fluid" src="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" alt="{{$data->tenPhong}}" />
                    </a>
                    <div class="mt-4">
                        @foreach($data->hinhAnhPhongTros as $image)
                        <a href="{{ asset('storage/' . $image->srcHinhAnh) }}" data-lightbox="rgallery{{$data->id}}">
                            <img src="{{ asset('storage/' . $image->srcHinhAnh) }}" style="width: 100px; height: auto;" alt="hinhanhphongtro" />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="room-info mt-4">
                    <h2>{{ $data->tenPhong }}</h2>
                    <p class="text-success">{{ number_format($data->loaiphongs->donGia, 0, ',', '.') }} đồng</p>
                    <p>{{ $data->moTa }}</p>
                    <p class="text-primary">{{ $data->loaiphongs->tenLoaiPhong }}</p>
                </div>
                @if ($data->khachthues)
                <p class="text-danger">Hết phòng</p>
                @else
                <form action="{{ route('dang_ki_phong') }}" method="POST">
                    @csrf
                    <input type="hidden" name="phong_id" value="{{ $data->id }}">
                    <input type="submit" class="home-btn-register mt-2 mb-2" value="Đăng kí ngay"/>
                </form>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
<style>
  .room-details {
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.room-details h2 {
    font-size: 24px;
    color: #333;
    font-weight: bold;
}

.room-details p {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
}

.room-info p {
    font-size: 16px;
    color: #007bff;
    font-weight: bold;
}

.room-info .text-success {
    color: #28a745;
}

.room-info .text-primary {
    color: #007bff;
}

.text-danger {
    color: #dc3545;
}

.home-btn-register {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.home-btn-register:hover {
    background-color: #0056b3;
}

</style>
@endsection
