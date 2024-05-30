@extends('frontlayout')
@section('content')

<div class="container my-4">
    <div class="pb-3 d-flex justify-content-between align-items-center" style="border-bottom: 4px solid #E6E6E6;">
        <h1 class="h2">Danh sách trọ<span class="h6 mx-4">{{ $countPhongTros }} phòng</span></h1>
    </div>
    <div class="row my-4">
    @foreach($phongtros as $phongtro)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 pt-4">
            <div class="card mb-4">
                <div class="card-body position-relative">
                    @if ($phongtro->tinhTrang == "Còn trống")
                        <div class="position-absolute" style="right: 0; top: 0; transform: translate(17px, -15px);">
                            <button class="btn btn-success rounded-pill">Còn phòng</button>
                        </div>
                    @else
                        <div class="position-absolute" style="right: 0; top: 0; transform: translate(17px, -15px);">
                            <button disabled class="btn btn-danger rounded-pill">Hết phòng</button>
                        </div>
                    @endif
                    <div class="fixed-height-container"> <!-- Thêm class fixed-height-container vào đây -->
                        <a href="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$phongtro->id}}">
                            <img class="img-fluid rounded w-100" src="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" alt="{{$phongtro->tenPhong}}" />
                        </a>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <h4>{{$phongtro->tenPhong}}</h4>
                    <div class="text-success font-weight-bold">
                        @if($phongtro->loaiphongs)
                        {{ number_format($phongtro->loaiphongs->donGia, 0, ',', '.') }} đồng
                        @endif
                    </div>
                    <div class="font-weight-bold text-primary">
                        {{$phongtro->loaiphongs->tenLoaiPhong}}
                    </div>
                    <div class="font-weight-bold text-primary">
                        {{$phongtro->moTa}}
                    </div>
                    <div class="mt-1">
                        @if ($phongtro->tinhTrang == "Còn trống")
                            <form action="{{ route('dang_ki_phong') }}" method="POST">
                                @csrf
                                <input type="hidden" name="phong_id" value="{{ $phongtro->id }}">
                                <input type="submit" class="btn btn-warning text-white rounded-pill" value="Đăng kí ngay"/>
                            </form>
                        @else
                            <form action="{{ route('dang_ki_phong') }}" method="POST">
                                @csrf
                                <input type="hidden" name="phong_id" value="{{ $phongtro->id }}">
                                <input type="submit" class="btn btn-warning text-white rounded-pill" style="visibility: hidden;" value="Đăng kí ngay" />
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
<style>
    .hide {
        display: none;
    }
    .fixed-height-container {
    width: 100%; /* Đảm bảo khung chứa hình ảnh đầy đủ chiều rộng của nó */
    height: 300px; /* Đặt chiều cao cố định cho khung chứa hình ảnh, bạn có thể thay đổi giá trị này tùy thích */
    overflow: hidden; /* Ngăn hình ảnh bị tràn ra khỏi khung chứa */
}

    @media (max-width: 576px) {
        .container {
            padding: 0 10px;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .btn {
            font-size: 14px;
            padding: 10px 20px;
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        .card img {
            height: 250px;
            object-fit: cover;
        }
    }
</style>
<script>
    document.getElementById('con-phong').addEventListener('click', function() {
        // Gửi yêu cầu AJAX đến route /con-phong
        fetch('/con-phong')
            .then(response => response.json())
            .then(data => {
                // Xử lý dữ liệu trả về để hiển thị danh sách phòng còn trống
                let roomList = document.getElementById('roomList');
                roomList.innerHTML = ''; // Xóa bỏ nội dung cũ của danh sách phòng
                data.forEach(room => {
                    // Tạo HTML cho mỗi phòng và thêm vào danh sách
                    let roomHTML = `
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 pt-4">
                            <div class="mb-2 font-weight-bold text-primary">${room.loaiphong}</div>
                            <div class="card mb-4">
                                <!-- Thêm các thông tin khác của phòng vào đây -->
                            </div>
                        </div>
                    `;
                    roomList.innerHTML += roomHTML;
                });
            })
            .catch(error => console.error('Error:', error));
    });
</script>

@endsection
