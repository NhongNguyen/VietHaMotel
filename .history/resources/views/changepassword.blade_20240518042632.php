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
                        @if(request()->ref != 'changepassword')
                            <tr>
                                <th>Họ khách thuê <span class="text-danger">*</span></th>
                                <td><input value="{{ $data->hoKhach }}" readonly name="hoKhach" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Tên khách thuê<span class="text-danger">*</span></th>
                                <td><input value="{{ $data->tenKhach }}" readonly name="tenKhach" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Ngày sinh <span class="text-danger">*</span></th>
                                <td><input value="{{ $data->ngaySinh }}" readonly name="ngaySinh" type="date" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Quê quán<span class="text-danger">*</span></th>
                                <td><input value="{{ $data->queQuan }}" readonly name="queQuan" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Nơi thường trú<span class="text-danger">*</span></th>
                                <td><input value="{{ $data->noiThuongTru }}" readonly name="noiThuongTru" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Số CCCD<span class="text-danger">*</span></th>
                                <td><input value="{{ $data->soCCCD }}" readonly name="soCCCD" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Ngày cấp<span class="text-danger">*</span></th>
                                <td><input value="{{ $data->ngayCap }}" readonly name="ngayCap" type="date" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Nơi cấp<span class="text-danger">*</span></th>
                                <td><input value="{{ $data->noiCap }}" name="noiCap" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td>
                                    <select name="gioiTinh" class="form-control">
                                        <option value="Nam" {{ $data->gioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ $data->gioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </td>
                            </tr>
                        @endif
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
                        @if(request()->ref != 'changepassword')
                            <tr>
                                <th>CCCD mặt trước<span class="text-danger">*</span></th>
                                <td>
                                    @if($data->CCCDtruoc)
                                        <img src="{{ asset('storage/'.$data->CCCDtruoc) }}" alt="CCCD truoc" width="100" />
                                    @endif
                                    <input name="CCCDtruoc" type="file" />
                                </td>
                            </tr>
                            <tr>
                                <th>CCCD mặt sau<span class="text-danger">*</span></th>
                                <td>
                                    @if($data->CCCDsau)
                                        <img src="{{ asset('storage/'.$data->CCCDsau) }}" alt="CCCD sau" width="100" />
                                    @endif
                                    <input name="CCCDsau" type="file" />
                                </td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện<span class="text-danger">*</span></th>
                                <td>
                                    @if($data->anhDaiDien)
                                        <img src="{{ asset('storage/'.$data->anhDaiDien) }}" alt="Anh dai dien" width="100" />
                                    @endif
                                    <input name="anhDaiDien" type="file" />
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2">
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
