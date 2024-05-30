@extends('frontlayout')

@section('content')

<section class="room-details">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <div class="main-image mb-4">
                    <a href="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$data->id}}">
                        <img class="img-fluid" src="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" alt="{{$data->tenPhong}}" />
                    </a>
                </div>

                <div class="room-images mb-4">
                    @foreach($data->hinhAnhPhongTros as $image)
                        <a href="{{ asset('storage/' . $image->srcHinhAnh) }}" data-lightbox="rgallery{{$data->id}}">
                            <img class="img-thumbnail room-thumbnail" src="{{ asset('storage/' . $image->srcHinhAnh) }}" alt="hinhanhphongtro" />
                        </a>
                    @endforeach
                </div>

                <h2>{{ $data->tenPhong }}</h2>
                <p class="text-success price">{{ number_format($data->loaiphongs->donGia, 0, ',', '.') }} đồng</p>
                <p class="description">{{ $data->moTa }}</p>
                <p class="text-primary room-type">{{ $data->loaiphongs->tenLoaiPhong }}</p>
            </div>

            <div class="col-md-4">
                <div class="availability">
                    @if ($data->khachthues)
                        <p class="text-danger">Hết phòng</p>
                    @else
                        <form action="{{ route('dang_ki_phong') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phong_id" value="{{ $data->id }}">
                            <input type="submit" class="btn btn-success mt-2 mb-2" value="Đăng kí ngay"/>
                        </form>
                    @endif
                </div>
                
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

<!-- Custom CSS -->
<style>
    .room-details .main-image img {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .room-details .room-images {
        display: flex;
        gap: 10px;
    }

    .room-details .room-images img {
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .room-details .room-images img:hover {
        transform: scale(1.1);
    }

    .room-details h2 {
        margin-top: 20px;
        font-size: 1.8rem;
        font-weight: 600;
    }

    .room-details .price {
        font-size: 1.5rem;
        font-weight: 500;
    }

    .room-details .description {
        margin-top: 15px;
        font-size: 1rem;
        line-height: 1.6;
    }

    .room-details .room-type {
        font-size: 1.1rem;
        font-weight: 500;
    }

    .room-details .availability {
        margin-bottom: 20px;
    }

    .room-details .tenant-info, .room-details .member-info {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .room-details .tenant-info h5, .room-details .member-info h5 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
</style>

@endsection
