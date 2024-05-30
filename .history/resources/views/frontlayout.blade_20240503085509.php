@auth
    <!-- Hiển thị nút đăng xuất nếu người dùng đã đăng nhập -->
    <a class="nav-link text-dark" href="{{ url('logout') }}">Đăng xuất</a>
    <a class="nav-link btn btn-sm btn-danger" href="{{ url('booking') }}">Đăng kí phòng</a>
@else
    <!-- Kiểm tra nếu session 'khachthuelogin' đã được đặt -->
    @if(session()->has('khachthuelogin'))
        <!-- Nếu đã đăng nhập, không hiển thị nút đăng nhập và đăng ký -->
    @else
        <!-- Hiển thị nút đăng nhập và đăng ký nếu chưa đăng nhập -->
        <a class="nav-link text-dark" href="{{ url('login') }}">Đăng nhập</a>
        <a class="nav-link text-dark" href="{{ url('register') }}">Đăng kí</a>
    @endif
    <a class="nav-link btn btn-sm btn-danger" href="{{ url('booking') }}">Đăng kí phòng</a>
@endauth
