@extends('frontlayout')
@section('content')

<div class="container my-4">
    <div class="pb-3 d-flex justify-content-between align-items-center" style="border-bottom: 4px solid #E6E6E6;">
        <h1 class="h2">Danh sách các phòng còn trống</h1>
    </div>
    <div class="row my-4">
        @foreach($phongtros as $phongtro)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 pt-4">
                <div class="mb-2 font-weight-bold text-primary">
                    {{$phongtro->loaiphongs->tenLoaiPhong}}
                </div>
                <div class="card mb-4">
                    <div class="card-body position-relative">
                        <div class="position-absolute" style="right: 0; top: 0; transform: translate(17px, -15px);">
                            <button class="btn btn-success rounded-pill">Còn phòng</button>
                        </div>
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
                            <form action="{{ route('dang_ki_phong') }}" method="POST">
                                @csrf
                                <input type="hidden" name="phong_id" value="{{ $phongtro->id }}">
                                <input type="submit" class="btn btn-warning text-white rounded-pill" value="Đăng kí ngay"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
