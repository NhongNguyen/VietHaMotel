@extends('frontlayout')

@section('content')

<section class="room-details">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $data->tenPhong }}</h2>
                <p class="text-success">{{ number_format($data->loaiphongs->donGia, 0, ',', '.') }} đồng</p>
                <p>{{ $data->moTa }}</p>
                <p class="text-primary">{{ $data->loaiphongs->tenLoaiPhong }}</p>
                <img src="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" class="img-fluid" alt="{{ $data->tenPhong }}">
                
                <div id="roomImagesCarousel" class="carousel slide mt-4" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($data->hinhAnhPhongTros as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->srcHinhAnh) }}" class="d-block w-100" alt="Image {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#roomImagesCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#roomImagesCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
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

@endsection
