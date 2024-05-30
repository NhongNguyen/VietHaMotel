@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm phòng
                <a href="{{url('admin/hopdong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="#" onclick="printdiv()">Print</a>
                
            </div>
        </div>
    </div>

</div>
<javascript>
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
</javascript>
<!-- /.container-fluid -->

@endsection
