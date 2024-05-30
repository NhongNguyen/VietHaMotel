@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết hợp đồng
                <a href="{{url('admin/hopdong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="printpage">
                <h4>Thông tin hợp đồng:</h4>
                <p><strong>Giá đặt cọc:</strong> {{$hopdong->giaDatCoc}}</p>
                <p><strong>Ngày bắt đầu:</strong> {{$hopdong->ngayBatDau}}</p>
                <p><strong>Ngày kết thúc:</strong> {{$hopdong->ngayKetThuc}}</p>
                
                <!-- <h4>Thông tin khách thuê:</h4>
                <p><strong>Họ và tên:</strong> {{$khachThue->hoKhach}} {{$khachThue->tenKhach}}</p>
                <p><strong>Số điện thoại:</strong> {{$khachThue->SDT}}</p>
                <p><strong>Quê quán:</strong> {{$khachThue->queQuan}}</p>
                <p><strong>Ngày sinh:</strong> {{$khachThue->ngaySinh}}</p>
                <p><strong>Ngày cấp CMND:</strong> {{$khachThue->ngayCap}}</p>
                <p><strong>Nơi thường trú:</strong> {{$khachThue->noiThuongTru}}</p> -->
            </div>
            <br>
            <a href="#" onclick="printdiv()">In hợp đồng</a>
                
        </div>
    </div>

</div>
<style>
    @media print{
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }
}
/* IE10+ CSS print styles */
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  /* IE10+ CSS print styles go here */
  @page {
    size: auto;   /* auto is the initial value */
    size: A4 portrait;
    margin: 0;  /* this affects the margin in the printer settings */
    border: 1px solid red;  /* set a border for all printed pages */
  }
}
</style>
<script>
    function printdiv()
{
    //your print div data
    //alert(document.getElementById("printpage").innerHTML);
    var newstr=document.getElementById("printpage").innerHTML;

    var header='<header><div align="center"><h3 style="color:#EB5005"> Your HEader </h3></div><br></header><hr><br>'

    var footer ="Your Footer";

    //You can set height width over here
    var popupWin = window.open('', '_blank', 'width=1100,height=600');
    popupWin.document.open();
    popupWin.document.write('<html> <body onload="window.print()">'+ newstr + '</html>' + footer);
    popupWin.document.close(); 
    return false;
}
</script>
<!-- /.container-fluid -->

@endsection
