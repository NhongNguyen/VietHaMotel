@extends('frontlayout')
@section('content')

<div class="container my-4">
    <div class="pb-3" style="border-bottom:4px solid #E6E6E6;display:flex; justify-content:space-between; align-items:center">
        <h1 >Danh sách trọ<span style="align-items:center;margin-left:20px;font-size:15px;font-weight:normal"> {{ $countPhongTros }} phòng</span></h1>
        <div>
            <button class="btn btn-success" style="border-radius:20px;font-weight:bold">Còn phòng</button>
        </div>
    </div>
    
    </div>
</div>

<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('vendor/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
<style type="text/css">
    .hide{
        display: none;
    }
</style>
@endsection
</body>
</html>
