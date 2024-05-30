@extends('frontlayout')
@section('content')
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div data-mdb-input-init class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                    <label for="birthdayDate" class="form-label">Birthday</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Gender: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                      value="option1" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                      value="option3" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-12">

                  <select class="select form-control-lg">
                    <option value="1" disabled>Choose option</option>
                    <option value="2">Subject 1</option>
                    <option value="3">Subject 2</option>
                    <option value="4">Subject 3</option>
                  </select>
                  <label class="form-label select-label">Choose option</label>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center"> FORM ĐĂNG KÍ
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
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/khachthue')}}">
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
                                            <td><input name="ngaySinh" type="date" id="ngaySinhInput" max="{{ date('Y-m-d') }}" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Quê quán<span class="text-danger">*</span></th>
                                            <td><input name="queQuan" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Nơi thường trú<span class="text-danger">*</span></th>
                                            <td><input name="noiThuongTru" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Số CCCD<span class="text-danger">*</span></th>
                                            <td><input name="soCCCD" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày cấp<span class="text-danger">*</span></th>
                                            <td><input name="ngayCap" type="date" max="{{ date('Y-m-d') }}" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Nơi cấp<span class="text-danger">*</span></th>
                                            <td><input name="noiCap" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Giới tính</th>
                                            <td>
                                                <select name="gioiTinh" class="form-control">
                                                    <option value="Nam">Nam</option>    
                                                    <option value="Nữ">Nữ</option>                                            
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tài khoản (Số điện thoại)<span class="text-danger">*</span></th>
                                            <td>
                                                <input type="text" pattern="[0-9]{8,10}" minlength="8" maxlength="10" name="SDT" class="form-control" required placeholder="Tài khoản phải là số và có từ 8 đến 10 số" title="Tài khoản phải là số và có từ 8 đến 10 chữ số">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mật khẩu<span class="text-danger">*</span></th>
                                            <td>
                                                <input name="matKhau" type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" placeholder="Mật khẩu (ít nhất 8 ký tự, chứa ít nhất một chữ cái và một số)" title="Mật khẩu phải chứa ít nhất một chữ cái và một số, và có ít nhất 8 ký tự" required />
                                            </td>
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
                                            <th>Ảnh đại diện</th>
                                            <td><input name="anhDaiDien" type="file" /></td>
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