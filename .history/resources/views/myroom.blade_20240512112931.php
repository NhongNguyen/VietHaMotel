@extends('frontlayout')
@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
        <h2>Thông tin phòng trọ</h2>
        <ul>
            @foreach($phongtros as $phongtro)
                <li>
                    <strong>Tên phòng:</strong> {{ $phongtro->tenPhong }} <br>
                    <strong>Tình trạng:</strong> {{ $phongtro->tinhTrang }} <br>
                    <!-- Thêm các thông tin khác nếu cần -->
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Hiển thị thông tin về khách thuê -->
    <div class="container">
        <h2>Thông tin khách thuê</h2>
        @if($khachthueId)
            <p><strong>ID:</strong> {{ $khachthueId }}</p>
            <p><strong>Tên:</strong> {{ $khachthueName }}</p>
            <!-- Thêm các thông tin khác nếu cần -->
        @else
            <p>Không có thông tin khách thuê.</p>
        @endif
    </div>
@endsection
