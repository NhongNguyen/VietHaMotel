@extends('frontlayout')
@section('content')
<style>
    /* Custom CSS for Change Password Form */
.change-password-form {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.change-password-form h6 {
    text-align: center;
    margin-bottom: 20px;
}

.change-password-form .form-control {
    width: 100%;
    margin-bottom: 15px;
}

.change-password-form .form-group img {
    display: block;
    margin: 10px auto;
    border-radius: 50%;
}

.change-password-form .btn-primary {
    width: 100%;
    padding: 10px;
}

</style>
<div class="container-fluid">
    <div class="card shadow mb-4 change-password-form">
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
            <form method="post" enctype="multipart/form-data" action="{{ url('admin/khachthue/'.$data->id) }}">
                @csrf
                @method('put')
             
                <div class="form-group">
                    <label for="SDT">Tài khoản (Số điện thoại)<span class="text-danger">*</span></label>
                    <input value="{{ $data->SDT }}" name="SDT" type="text" class="form-control" id="SDT" />
                </div>
                <div class="form-group">
                    <label for="matKhau">Mật khẩu<span class="text-danger">*</span></label>
                    <input name="matKhau" type="password" class="form-control" id="matKhau" />
                </div>
                <div class="form-group">
                    <label for="matKhau_confirmation">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                    <input name="matKhau_confirmation" type="password" class="form-control" id="matKhau_confirmation" />
                </div>
                <div class="form-group text-center" >
                    <label for="matKhau_confirmation">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                    <div style="display:flex">
                    @if($data->anhDaiDien)
                        <img src="{{ asset('storage/'.$data->anhDaiDien) }}" alt="Ảnh đại diện" width="100" />
                    @endif
                    <input name="anhDaiDien" type="file"/>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="ref" value="changepassword" />
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
