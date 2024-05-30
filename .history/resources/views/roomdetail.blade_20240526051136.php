@extends('frontlayout')

@section('content')

<section class="room-details">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="room-images">
                    <a href="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$data->id}}">
                        <img class="img-fluid rounded" src="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" alt="{{$data->tenPhong}}" />
                    </a>
                    <div class="mt-4">
                        @foreach($data->hinhAnhPhongTros as $image)
                        <a href="{{ asset('storage/' . $image->srcHinhAnh) }}" data-lightbox="rgallery{{$data->id}}">
                            <img class="img-thumbnail home-card-img-item" src="{{ asset('storage/' . $image->srcHinhAnh) }}" style="width: 100px; height: auto;" alt="hinhanhphongtro" />
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
                    <input type="submit" class="btn btn-success mt-2 mb-2" value="Đăng kí ngay"/>
                </form>
                @endif
                <div class="tenant-info mt-4">
                    <h5>Thông tin khách thuê</h5>
                    @if($data->khachthues)
                    <p>Tên: {{ $data->khachthues->tenKhach }} {{ $data->khachthues->hoKhach }}</p>
                    @else
                    <p style="color:red">Không có thông tin khách thuê</p>
                    @endif
                </div>
                <div class="member-info mt-4">
                    <h5>Thông tin thành viên</h5>
                    @if($data->thanhviens)
                    <p>Tên: {{ $data->thanhviens->tenThanhVien }} {{ $data->thanhviens->hoThanhVien }}</p>
                    @else
                    <p style="color:red">Không có thông tin thành viên</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
<style>
  .room-images {
    position: relative; /* Đặt vị trí của các hình ảnh là tương đối để chúng có thể được định vị */
}

.room-images img {
    width: 100%; /* Ảnh sẽ hiển thị 100% chiều rộng của phần tử cha */
    height: auto; /* Chiều cao tự động điều chỉnh để giữ tỷ lệ khung hình */
    border-radius: 10px; /* Bo tròn góc của ảnh */
    margin-bottom: 10px; /* Tạo khoảng cách giữa các ảnh */
}

.room-info h2 {
    margin-top: 0; /* Loại bỏ khoảng cách trên cùng của tiêu đề */
}

.room-info p {
    margin-bottom: 10px; /* Tạo khoảng cách giữa các đoạn văn bản */
}

.tenant-info, .member-info {
    margin-top: 20px; /* Tạo khoảng cách giữa các phần thông tin */
}

.text-danger, .text-primary, .text-success {
    margin-bottom: 10px; /* Tạo khoảng cách giữa các đoạn văn bản có màu */
}
</style>
@endsection
