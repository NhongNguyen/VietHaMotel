@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cập nhật {{$data->tenDichVu}}
                                <a href="{{url('admin/dichvu')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/dichvu/'.$data->id)}}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Tên dịch vụ</th>
                                            <td><input value="{{$data->tenDichVu}}" name="tenDichVu" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Giá dịch vụ</th>
                                            <td><input value="{{$data->giaDichVu}}" name="giaDichVu" type="number" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Mô tả</th>
                                            <td><textarea name="moTa" class="form-control">{{$data->moTa}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" value="Chấp nhận"/>
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@section('scripts')
@endsection

@endsection