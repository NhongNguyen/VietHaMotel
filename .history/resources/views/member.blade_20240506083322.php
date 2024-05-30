@extends('frontlayout')
@section('content')

<div class="container" style="height:500px;">
    @if(Session::has('error'))
    <p class="text-danger">{{session('error')}}</p>
    @endif
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Login Form -->
            <form action="{{ route('chon_thanh_vien') }}" method="POST">
                <div style="padding-top:10px; padding-bottom:10px; color:black;"><h2>THÀNH VIÊN</h2> </div>
                @csrf
                <input type="hidden" name="phong_id" value="{{ $phong_id ?? '' }}">
             
                <input type="submit" class="fadeIn fourth mt-4 display-4" value="Chấp nhận">
            </form>
        </div>
    </div>
</div>

@endsection
