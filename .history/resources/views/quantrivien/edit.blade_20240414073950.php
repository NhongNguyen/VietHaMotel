@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cập nhật {{$data->tenQTV}}
                                <a href="{{url('admin/quantrivien')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" method="post" action="{{url('admin/quantrivien/'.$data->id)}}">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Họ quản trị viên</th>
                                            <td><input value="{{$data->hoQTV}}" name="hoQTV" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tên quản trị viên</th>
                                            <td><input value="{{$data->tenQTV}}" name="tenQTV" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Họ quản trị viên</th>
                                            <td><input value="{{$data->SDT}}" name="tenQTV" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Họ quản trị viên</th>
                                            <td><input value="{{$data->tenQTV}}" name="tenQTV" type="text" class="form-control" /></td>
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