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
            </div>
            <div class="col-md-4">
                @if ($data->tinhTrang == "Còn trống")
                    <form action="{{ route('dang_ki_phong') }}" method="POST">
                        @csrf
                        <input type="hidden" name="phong_id" value="{{ $data->id }}">
                        <input type="submit" class="btn btn-success mt-2 mb-2" value="Đăng kí ngay"/>
                    </form>
                @else
                    <p class="text-danger">Hết phòng</p>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
