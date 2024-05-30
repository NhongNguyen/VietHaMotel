@extends('frontlayout')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cập nhật khách thuê</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif

            @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form method="post" enctype="multipart/form-data" action="{{ url('admin/khachthue/'.$data->id) }}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Tài khoản (Số điện thoại)<span class="text-danger">*</span></th>
                            <td><input value="{{ $data->SDT }}" name="SDT" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Mật khẩu<span class="text-danger">*</span></th>
                            <td><input name="matKhau" type="password" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Nhập lại mật khẩu<span class="text-danger">*</span></th>
                            <td><input name="matKhau_confirmation" type="password" class="form-control" /></td>
                        </tr>
                            <tr>
                                <td>
                                    @if($data->anhDaiDien)
                                        <img src="{{ asset('storage/'.$data->anhDaiDien) }}" alt="Anh dai dien" width="100" />
                                    @endif
                                    <input readonly name="anhDaiDien" type="file" />
                                </td>
                            </tr>
                            <tr>
                            <td colspan="2">
                                <input 
                                <input type="submit" class="btn btn-primary" value="Cập nhật" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
