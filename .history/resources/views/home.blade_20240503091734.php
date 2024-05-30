@extends('frontlayout')
@section('content')

<div class="container my-4">
    <div class="pb-3" style="border-bottom:4px solid #E6E6E6;display:flex; justify-content:space-between; align-items:center">
        <h1 >Danh sách trọ<span style="align-items:center;margin-left:20px;font-size:15px;font-weight:normal"> {{ $countPhongTros }} phòng</span></h1>
        <div>
            <button class="btn btn-success" style="border-radius:20px;font-weight:bold">Còn phòng</button>
        </div>
    </div>
    <div class="row my-4">
        @foreach($phongtros as $phongtro)
            <div class="col-md-3 pt-4">
                {{$phongtro->loaiphongs->tenLoaiPhong}}
                <div class="card mb-4">
                    <div class="card-body" style="position:relative">
                        @if ($phongtro->tinhTrang == "Còn trống")
                            <div style="position:absolute;right:0;top:0;transform:translate(17px,-15px);"><button class="btn btn-success" style="border-radius:20px;">Còn phòng</button></div>  
                        @else
                            <div style="position:absolute;right:0;top:0;transform:translate(17px,-15px);"><button disabled class="btn btn-danger" style="border-radius:20px;">Hết phòng</button></div>  
                        @endif
                        <a href="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}"data-lightbox="rgallery{{$phongtro->id}}">
                            <img class="img-fluid" src="{{ asset('storage/'.$phongtro->hinhAnhDaiDien) }}"  style="width:300px;height:300px;border-radius:20px;" />
                        </a>
                    </div>
                    <div class="card-footer" >
                        <h4>{{$phongtro->tenPhong}}</h4>
                        <div class="text-success" style="font-weight:bold">@if($phongtro->loaiphongs) <!-- Kiểm tra xem $loaiphongs có tồn tại không -->
                            {{$phongtro->loaiphongs->donGia}} đồng
                        @endif
                        </div>
                        <div style="text-align:center; margin-top:10px;">
                        @if ($phongtro->tinhTrang == "Còn trống")
                        <form action="{{ route('dang_ki_phong') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phong_id" value="{{ $phongtro->id }}">
                            <!-- Đặt các trường thông tin khác cần thiết -->
                            <input type="submit" style="background-color:#C5A914;border-radius:20px;color:white" value="Đăng kí ngay" style=""/>
                        </form>                        
                        @else
                            <input type="hidden" name="phong_id" value="{{ $phongtro->id }}">
                            <input type="submit" style="visibility:hidden;background-color:#C5A914;border-radius:20px;color:white" value="Đăng kí ngay" style=""/> 
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
<style type="text/css">
    .hide{
        display: none;
    }
</style>
@endsection
</body>
</html>
