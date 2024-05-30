@extends('frontlayout')
@section('content')

<section class="home">
    <div class="home-img">
        <div class="img-container fade-out">
            <img class="full-width-img" alt="house" src="https://source.unsplash.com/random/1024x500/?house">
            <div class="overlay"></div>
            <div class="home-img-text">VIỆT HÀ</div> 
        </div>
    </div>

    <div class="container my-4" style="z-index:100">
        <div class="pb-3 d-flex justify-content-between align-items-center" style="border-bottom: 4px solid #E6E6E6;">
            <h1 class="text-white" style="z-index:99">Danh sách trọ<span class="h6 mx-4">{{ $countPhongTros }} phòng</span></h1>
            <input type="text" id="searchInput" placeholder="Tìm kiếm tên phòng...">
            <button id="con-phong" class="btn btn-success">Còn phòng</button>
        </div>
        <div class="room-type-section">
            @foreach($loaiphongs as $loaiPhong)
                <div class="room-type-title" data-id="{{ $loaiPhong->id }}">{{ $loaiPhong->tenLoaiPhong }}</div>
            @endforeach
        </div>

        <div id="roomList">
            @foreach($phongtros as $loaiPhong => $rooms)
                <div class="room-type-section">
                    <div class="row my-4">
                    <div class="room-type-title">{{ $loaiPhong }}</div>
                        @foreach($rooms as $phongtro)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 pt-4">
                                <div class="card mb-4 home-card">
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
                                        <div class="fixed-height-container home-card-img">
                                            <a href="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$phongtro->id}}">
                                                <img class="home-card-img-item" src="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" alt="{{$phongtro->tenPhong}}" />
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
                                                    <input type="submit" class="home-btn-register mt-2 mb-2" value="Đăng kí ngay"/>
                                                </form>
                                            @else
                                                <form action="{{ route('dang_ki_phong') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="phong_id" value="{{ $phongtro->id }}">
                                                    <input type="submit" class="home-btn-register mt-2 mb-2" style="visibility: hidden;" value="Đăng kí ngay" />
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
<style>
   #searchInput {
    width: 40%; /* Tự động thay đổi chiều rộng tương ứng với kích thước của phần tử chứa nó */
    padding: 12px 15px; /* Lề và padding */
    font-size: 16px; /* Kích thước chữ */
    border: 1px solid #ccc; /* Viền */
    border-radius: 5px; /* Góc bo tròn */
    box-sizing: border-box; /* Kích thước tính cả border và padding */
    background-color: #f8f8f8; /* Màu nền */
    }

    #searchInput:focus {
        outline: none; /* Loại bỏ đường viền khi tập trung */
        border-color: #4CAF50; /* Màu viền khi tập trung */
        box-shadow: 0 0 8px rgba(0, 128, 0, 0.4); /* Hiệu ứng bóng đổ khi tập trung */
    }
    .hide {
        display: none;
    }
    .fixed-height-container {
        width: 100%;
        height: 300px;
        overflow: hidden;
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
    @media (max-width: 1024px) {
    .text-white {
        text-align: center; /* Căn giữa tiêu đề và số lượng phòng */
    }
    .h6.mx-4 {
        display: block; /* Hiển thị số lượng phòng ở dưới tiêu đề */
        margin-top: 10px; /* Khoảng cách giữa tiêu đề và số lượng phòng */
        text-align: center; /* Căn giữa tiêu đề và số lượng phòng */
    }
}
</style>
<script>
   $(document).ready(function(){
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".card h4").filter(function() {
            $(this).closest('.home-card').toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

  document.getElementById('con-phong').addEventListener('click', function() {
    fetch('/con-phong')
        .then(response => response.json())
        .then(data => {
            let roomList = document.getElementById('roomList');
            roomList.innerHTML = ''; 
            let rowDiv = document.createElement('div');
            rowDiv.classList.add('row');
            data.forEach((room, index) => {
                let roomHTML = `
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 pt-4">
                        <div class="card mb-4 home-card">
                            <div class="card-body position-relative">
                                <div class="position-absolute" style="right: 0; top: 0; transform: translate(17px, -15px);">
                                    <button class="btn btn-success rounded-pill">Còn phòng</button>
                                </div>
                                <div class="fixed-height-container">
                                    <a href="/storage/${room.hinhAnhDaiDien}" data-lightbox="rgallery${room.id}">
                                        <img class="img-fluid rounded w-100" src="/storage/${room.hinhAnhDaiDien}" alt="${room.tenPhong}" />
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <h4>${room.tenPhong}</h4>
                                <div class="text-success font-weight-bold">
                                    ${room.loaiphongs ? room.loaiphongs.donGia.toLocaleString() : ''} đồng
                                </div>
                                <div class="font-weight-bold text-primary">
                                    ${room.loaiphongs ? room.loaiphongs.tenLoaiPhong : ''}
                                </div>
                                <div class="font-weight-bold text-primary">
                                    ${room.moTa}
                                </div>
                                <div class="mt-1">
                                    <form action="/dang-ki-phong" method="POST">
                                        @csrf
                                        <input type="hidden" name="phong_id" value="${room.id}">
                                        <input type="submit" class="home-btn-register mt-2 mb-2" value="Đăng kí ngay"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                rowDiv.innerHTML += roomHTML;
                if ((index + 1) % 4 === 0 || index === data.length - 1) {
                    roomList.appendChild(rowDiv);
                    rowDiv = document.createElement('div');
                    rowDiv.classList.add('row');
                }
            });
        })
        .catch(error => console.error('Error:', error));
});


</script>

@endsection
