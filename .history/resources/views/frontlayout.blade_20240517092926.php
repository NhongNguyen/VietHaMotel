<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link href="{{ asset('bs5/bootstrap.min.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('bs5/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    /* Your CSS styles */
</style>
<body style="background-color: #E1E1E1;">
<nav class="navbar navbar-expand-lg navbar navbar-light" style="position:fixed;top:0;width:100%;z-index:10; background-color: #E1E1E1;">
    <div class="container">
        <a class="navbar-brand text-success " style="font-size:20px"  href="{{ url('/') }}">VIỆT HÀ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-dark" href="{{ url('services') }}">Dịch vụ</a>                
                <a class="nav-link text-dark" href="{{ url('rules') }}">Nội quy</a>          
                <a class="nav-link text-dark" href="{{ url('about-us') }}">Về chúng tôi</a>                
                <!-- Kiểm tra nếu session 'khachthuelogin' đã được đặt -->
                @if(session()->has('khachthuelogin') && is_array(session('khachthuelogin')))
    <a class="nav-link text-dark" href="{{ url('myroom') }}">Phòng trọ của tôi</a>
    <span class="nav-link text-dark">Xin chào, {{ session('khachthuelogin')['tenKhach'] }}!</span>
    <a class="nav-link text-dark" href="{{ url('logout') }}">Đăng xuất</a>
@else
    <!-- Hiển thị nút đăng nhập và đăng ký nếu chưa đăng nhập -->
    <a type="button" class="btn btn-secondary nav-link text-dark text-white" href="{{ url('register') }}">Đăng kí</a>
    <a type="button" class="btn btn-primary nav-link text-dark text-white mx-2" href="{{ url('login') }}">Đăng nhập</a>
@endif
                    <!-- Hiển thị nút đăng nhập và đăng ký nếu chưa đăng nhập -->
                    <a type="button" class="btn btn-secondary nav-link text-dark text-white" href="{{ url('register') }}">Đăng kí</a>
                    <a type="button" class="btn btn-primary nav-link text-dark text-white mx-2" href="{{ url('login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<main style="margin-top:50px; margin-bottom:30px;">
    @yield('content')
</main>
<footer style="background-color:#E7ECFF; bottom: 0; width: 100%;">
    <div class="container">
        <div class="d-flex justify-content-between pt-3 pb-3">
            <a class=" text-success" style="text-decoration:none; font-size:20px" href="{{ url('/') }}">VIỆT HÀ</a>
            <a class="text-light" style="font-size:12px;background-color:#111B47; text-decoration:none; padding:5px 20px; align-self:center;" href="{{ url('login') }}">Đăng nhập</a>
        </div>
        <div style="border-bottom: 1px solid #E5E5E5"></div>
        <div class="">
        <section class="d-flex justify-content-between pt-1 pb-1" style="font-size:12px">
            <div class="flex">
                <a class="text-dark px-2" style="text-decoration:none" href="{{ url('services') }}">Dịch vụ</a>                
                <a class="text-dark px-2" style="text-decoration:none" href="{{ url('rules') }}">Nội quy</a>          
                <a class="text-dark px-2" style="text-decoration:none" href="{{ url('about-us') }}">Về chúng tôi</a>    
            </div>
            <div style="padding-bottom:20px;">
            <a href="tel:0912305179" class="me-4 text-reset">
                <img src="{{ asset('img/zalo.png') }}" height="18px" alt="">
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fa-brands fa-facebook-messenger"></i>
            </a>
            <a href="tel:0912305179" class="me-4 text-reset">
                <i class="fa fa-phone"></i>
            </a>
            </div>
        </section>
        </div>
    </div>
</footer>
</body>
</html>
