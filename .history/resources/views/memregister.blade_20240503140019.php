@extends('frontlayout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                            @endif

                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/thanhvien')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Họ thành viên</th>
                                            <td><input name="hoThanhVien" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tên thành viên</th>
                                            <td><input name="tenThanhVien" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>CCCD mặt trước<span class="text-danger">*</span></th>
                                            <td><input   name="CCCDtruoc" type="file"/></td>
                                        </tr>
                                        <tr>
                                            <th >CCCD mặt sau<span class="text-danger">*</span></th>
                                            <td><input name="CCCDsau" type="file" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" value="Chấp nhận" />
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection