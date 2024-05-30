@extends('frontlayout')
@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
    <div class="container">
        <h2>Thông tin phòng trọ</h2>
        
    </div>

    <!-- Hiển thị thông tin về khách thuê -->
    <div class="container">
        <h2>Thông tin khách thuê</h2>
        @if(isset($khachthueId))
            <p><strong>ID:</strong> {{ $khachthueId }}</p>
            <p><strong>Tên:</strong> {{ $khachthueName }}</p>
            <!-- Thêm các thông tin khác nếu cần -->
        @else
            <p>Không có thông tin khách thuê.</p>
        @endif
    </div>
@endsection
