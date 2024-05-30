@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Customer
                                <a href="{{url('admin/customer')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
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
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/customer')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Họ khách thuê <span class="text-danger">*</span></th>
                                            <td><input name="hoKhach" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Tên khách thuê<span class="text-danger">*</span></th>
                                            <td><input name="tenKhach" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày sinh <span class="text-danger">*</span></th>
                                            <td><input name="ngaySinh" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th> <span class="text-danger">*</span></th>
                                            <td><input name="hoKhachThue" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Họ khách thuê <span class="text-danger">*</span></th>
                                            <td><input name="hoKhachThue" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Email <span class="text-danger">*</span></th>
                                            <td><input name="email" type="email" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Password <span class="text-danger">*</span></th>
                                            <td><input name="password" type="password" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile <span class="text-danger">*</span></th>
                                            <td><input name="mobile" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Photo</th>
                                            <td><input name="photo[]" multiple type="file" /></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><textarea name="address" class="form-control"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
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