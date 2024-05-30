<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản trị viên</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bạn đã quay trở lại!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{url('admin/login')}}">
                                        @csrf
                                        <div class="form-group">
<input type="text" name="username" class="form-control form-control-user" @if(Cookie::has('adminuser')) value="{{Cookie::get('adminuser')}}" @endif
                                                id="username" name="username" aria-describedby="emailHelp"
                                                placeholder="tài khoản">
                                        </div>
                                        <div class="form-group">
<input name="password" @if(Cookie::has('adminpwd')) value="{{Cookie::get('adminpwd')}}" @endif  type="password" class="form-control form-control-user"
                                                id="exampleInputmatkhau" placeholder="mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
<input type="checkbox" @if(Cookie::has('adminuser')) checked @endif name="rememberme" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Nhớ tài khoản</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng nhập" />
                                        
                                    </form>

                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <p class="text-danger">{{$error}}</p>
                                        @endforeach
                                    @endif

                                    @if(Session::has('msg'))
                                        <p class="text-danger">{{session('msg')}}</p>
                                    @endif

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-matkhau.html">Quên mật khẩu?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<!-- Phần HTML để hiển thị -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2>User Credentials from Database</h2>
            <div id="user-credentials">
                <?php
                // Kết nối đến cơ sở dữ liệu
                $conn = mysqli_connect("localhost", "root", "", "hotelmanager");

                // Kiểm tra kết nối
                if ($conn === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }

                // Truy vấn dữ liệu từ cơ sở dữ liệu
                $sql = "SELECT `id`, `username`, `matkhau` FROM `admins` ";
                $result = mysqli_query($conn, $sql);

                // Kiểm tra kết quả trả về
                if ($result === false) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    // Hiển thị dữ liệu lấy được
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<p><strong>Username:</strong> " . $row['username'] . ", <strong>matkhau:</strong> " . $row['password'] . "</p>";
                        }
                    } else {
                        echo "0 results";
                    }
                }

                // Đóng kết nối
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>

 -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
