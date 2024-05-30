<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/Remove-bg.ai_1712913981627.ico') }}" type="image/x-icon">
    <title>@if(session('adminData'))
    Chào {{  session('adminData')->hoQTV }} {{  session('adminData')->tenQTV }} 
    @endif
    </title>

    @if(!Session::has('adminData'))
        <script type="text/javascript">
            window.location.href="{{url('admin/login')}}";
        </script>
    @endif

    <!-- Custom fonts for this template-->
    <!-- <link href="{{asset('public')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link -->
        <!-- href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" -->
        <!-- rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <!-- <link href="{{asset('public')}}/css/sb-admin-2.min.css" rel="stylesheet"> -->
<!-- Custom fonts for this template-->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion"  style=" background-image: linear-gradient(to right, #845ca5 ,#387db9)" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                   <img src="{{ asset('img/Remove-bg.ai_1712913981627.ico') }}" height="75">
                </div>
                <div class="sidebar-brand-text mx-3">Nhà trọ Việt Hà</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Danh mục
            </div>

            <!-- <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/banner*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#bannerSection"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-images"></i>
                    <span>HomePage Banners</span>
                </a>
                <div id="bannerSection" class="collapse @if(request()->is('admin/banner*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/banner/create')}}">Add New</a>
                        <a class="collapse-item" href="{{url('admin/banner')}}">View All</a>
                    </div>
                </div>
            </li> -->

            <!-- QuanTriVienMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/quantrivien*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#QuanTriVienMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users-cog"></i>
                    <span>Quản trị viên</span>
                </a>
                <div id="QuanTriVienMaster" class="collapse @if(request()->is('admin/quantrivien*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/quantrivien/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/quantrivien')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/loaiphong*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#loaiphongMaster"
                    aria-expanded="true" aria-controls="loaiphongMaster">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Loại phòng</span>
                </a>
                <div id="loaiphongMaster" class="collapse @if(request()->is('admin/loaiphong*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/loaiphong/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/loaiphong')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

            <!-- RoomMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/phongtros*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#phongtroMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-house-user"></i>
                    <span>Phòng trọ</span>
                </a>
                <div id="phongtroMaster" class="collapse @if(request()->is('admin/phongtros*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/phongtros/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/phongtros')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

            <!-- ImageMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/phongtros*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#phongtroMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-house-user"></i>
                    <span>Hình ảnh phòng trọ</span>
                </a>
                <div id="phongtroMaster" class="collapse @if(request()->is('admin/phongtros*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/phongtros/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/phongtros')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

             <!-- NoiQuyMaster -->
             <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/noiquy*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#noiquyMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list"></i>
                    <span>Nội quy</span>
                </a>
                <div id="noiquyMaster" class="collapse @if(request()->is('admin/noiquy*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/noiquy/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/noiquy')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

             <!-- DichVuMaster -->
             <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/dichvu*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#dichvuMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-cart-plus"></i>
                    <span>Dịch vụ</span>
                </a>
                <div id="dichvuMaster" class="collapse @if(request()->is('admin/dichvu*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/dichvu/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/dichvu')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

            <!-- KhachThueMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/khachthue*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#KhachThueMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Khách thuê</span>
                </a>
                <div id="KhachThueMaster" class="collapse @if(request()->is('admin/khachthue*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/khachthue/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/khachthue')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

            <!-- ThanhVienMaster -->
            <li class="nav-item">
                <a class="nav-link @if(!request()->is('admin/thanhvien*')) collapsed @endif" href="#" data-toggle="collapse" data-target="#ThanhVienMaster"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-plus"></i>
                    <span>Thành viên</span>
                </a>
                <div id="ThanhVienMaster" class="collapse @if(request()->is('admin/thanhvien*')) show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{url('admin/thanhvien/create')}}">Thêm mới</a>
                        <a class="collapse-item" href="{{url('admin/thanhvien')}}">Xem tất cả</a>
                    </div>
                </div>
            </li>

             <!-- HopDongMaster -->
             <li class="nav-item">
                <a class="nav-link" href="{{url('admin/hopdong')}}">
                    <i class="fas fa-pen-nib"></i>
                    <span>Hợp đồng</span></a>
            </li>
            
            <!-- HoaDonMaster -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/hoadon')}}">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Hóa đơn</span></a>
            </li>
            
             <!-- HoaDonMaster -->
             <li class="nav-item">
                <a class="nav-link" href="{{url('admin/chitiethoadon')}}">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Chi tiết hóa đơn</span></a>
            </li>
            
            <!-- HoaDonMaster -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/chitiethoadondichvu')}}">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Chi tiết hóa đơn và dịch vụ</span></a>
            </li>
            
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/logout')}}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Đăng xuất</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div style="padding:10px; text-align:center">
                                    @if(session('adminData'))
                                    {{  session('adminData')->hoQTV }} {{  session('adminData')->tenQTV }} 
                                    @endif
                                </div>
                                                       
                                <a class="dropdown-item" href="{{url('admin/logout')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TRỌ VIỆT HÀ 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn đã sẵn sàng để rời khỏi trang?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn chấp nhận ở dưới để đăng xuất</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-success" href="{{url('admin/logout')}}">Chấp nhận</a>
                </div>
            </div>
        </div>
    </div>

    <!--  Bootstrap core JavaScript -->
    <!-- <script src="{{asset('public')}}/vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="{{asset('public')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="{{asset('public')}}/vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="{{asset('public')}}/js/sb-admin-2.min.js"></script> -->
<!--  Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @yield('scripts')

</body>

</html>