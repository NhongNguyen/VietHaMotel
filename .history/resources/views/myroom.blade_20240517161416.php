@extends('frontlayout')

@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
   
@endsection
@if(isset($showContent) && $showContent == false)
    <!-- Không hiển thị nội dung -->
@else
    @extends('frontlayout')

    @section('content')
        <!-- Hiển thị nội dung -->
        <div class="container">
            <!-- Các thông tin về phòng trọ và hợp đồng -->
        </div>
    @endsection
@endif
