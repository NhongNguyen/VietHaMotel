@extends('frontlayout')

@section('content')

<section class="room-details">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
              <a href="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}" data-lightbox="rgallery{{$data->id}}">
                  <img class="home-card-img-item" src="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" alt="{{$phongtro->tenPhong}}" />
              </a>
             
              <div class="room-images mt-4">
                  @foreach($data->hinhAnhPhongTros as $image)
                      <img src="{{ asset('storage/' . $image->srcHinhAnh) }}" class="img-thumbnail" style="width: 100px; height: auto;">
                  @endforeach
              </div>
                <h2>{{ $data->tenPhong }}</h2>
                <p class="text-success">{{ number_format($data->loaiphongs->donGia, 0, ',', '.') }} đồng</p>
                <p>{{ $data->moTa }}</p>
                <p class="text-primary">{{ $data->loaiphongs->tenLoaiPhong }}</p>
                
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
