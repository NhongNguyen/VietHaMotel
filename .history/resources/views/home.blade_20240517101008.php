@extends('frontlayout')
@section('content')

<div class="container my-4">
    <div class="pb-3 d-flex justify-content-between align-items-center" style="border-bottom: 4px solid #E6E6E6;">
        <h1 class="h2">Danh sách trọ<span class="h6 mx-4">{{ $countPhongTros }} phòng</span></h1>
        <div>
            <button class="btn btn-success rounded-pill font-weight-bold con">Còn phòng</button>
        </div>
    </div>
    <div class="row my-4">
    @foreach($phongtros as $phongtro)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 pt-4">
            <div class="mb-2 font-weight-bold text-primary">
                {{$phongtro->loaiphongs->tenLoaiPhong}}
            </div>
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
                    <a href="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$phongtro->id}}">
                        <img class="img-fluid rounded w-100" src="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" alt="{{$phongtro->tenPhong}}" />
                    </a>
                </div>
                <div class="card-footer text-center">
                    <h4>{{$phongtro->tenPhong}}</h4>
                    <div class="text-success font-weight-bold">
                        @if($phongtro->loaiphongs)
                            {{$phongtro->loaiphongs->donGia}} đồng
                        @endif
                    </div>
                    <div class="mt-2">
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
    $(document).ready(function(){
        $(".btn-success").click(function(){
            $.ajax({
                url: "{{ route('danh_sach_con_phong') }}",
                type: 'GET',
                success:function(data) {
                    // Hiển thị danh sách phòng còn trống trong một modal hoặc một phần tử khác
                    // Ví dụ: $('#modal').html(data).modal('show');
                    // Đoạn mã này cần thay đổi tùy theo cách bạn muốn hiển thị danh sách phòng
                    // Dưới đây là một ví dụ đơn giản để hiển thị dữ liệu trong console
                    console.log(data);
                },
                error:function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
