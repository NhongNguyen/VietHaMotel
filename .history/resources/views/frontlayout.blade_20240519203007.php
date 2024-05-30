<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link href="{{ asset('bs5/bootstrap.min.css') }}" rel="stylesheet" />
		<script type="text/javascript" src="{{ asset('bs5/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/structures.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lora:ital,wght@0,400..700;1,400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar navbar-light">
    <div class="container">
      <div class="navbar-logo">
        @if(session()->has('khachthuelogin') && session('khachthuelogin')->phongTro)
            <!-- Render the text without hyperlink if the tenant has a room -->
        <span class="navbar-brand text-success navbar-logo">VIỆT HÀ</span>
        @else
            <!-- Render the hyperlink if the tenant does not have a room -->
          <a class="navbar-brand text-success navbar-logo"href="{{ url('/') }}">VIỆT HÀ</a>
        @endif   
      </div>     
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link text-dark" style="font-weight:bold" href="{{ url('services') }}">Dịch vụ</a>                
          <a class="nav-link text-dark" style="font-weight:bold" href="{{ url('rules') }}">Nội quy</a>          
          <a class="nav-link text-dark"style="font-weight:bold" href="{{ url('about-us') }}">Về chúng tôi</a>                
          @if(session()->has('khachthuelogin'))
            @if(session('khachthuelogin')->anhDaiDien)
              <div class="img-avatar">
                  <img src="{{ asset('storage/'.session('khachthuelogin')->anhDaiDien) }}" alt="Avatar" style="width:40px; height:40px; border-radius:50%; margin-right:10px;">                         
              </div>
              <div>
                  <div id="user-info" style="display: none; position: absolute; top: 70px; right: 10px; background-color: white; padding: 10px; border: 1px solid #ccc;">
                    @if(session()->has('khachthuelogin') && session('khachthuelogin')->phongTro)
                        <div style="display:flex;flex-direction:column">
                            <p>Chào {{ session('khachthuelogin')->hoKhach }} {{ session('khachthuelogin')->tenKhach }}</p>
                            <a type="button"  style="text-align:center; border-radius:2px; padding: 10px; margin-bottom:10px;" href="{{ url('myroom') }}">Thông tin của tôi</a>
                            <a type="button"  style="text-align:center; border-radius:2px; padding: 10px; margin-bottom:10px;" href="{{ url('changepassword') }}">Cập nhật thông tin cá nhân</a>            
                            <a type="button" class="btn btn-danger" href="{{ url('logout') }}">Đăng xuất</a>
                        </div>
                    @endif
                  </div>
              </div>
            @endif
          @else
            <!-- Hiển thị nút đăng nhập và đăng ký nếu chưa đăng nhập -->
            <a  class="btn-login" href="{{ url('register') }}">Đăng ký</a>
            <a  class="btn-login mx-2" href="{{ url('login') }}">Đăng nhập</a>
          @endif
        </div>
      </div>
    </div>
  </nav>
    <main style="margin-top:60px; margin-bottom:30px;">
        @yield('content')
    </main>
    <footer style="background-color:#E7ECFF; bottom: 0; width: 100%;">
        <div class="container">
          @if(session()->has('khachthuelogin') && session('khachthuelogin')->phongTro)
            <div class="d-flex justify-content-between pt-3 pb-3">
                <div class="nav href="{{ url('/') }}">VIỆT HÀ</div>
                <!-- <div class= "text-light" style="font-size:12px;background-color:#111B47; text-decoration:none; padding:5px 20px; align-self:center;" href="{{ url('login') }}">Đăng nhập</div> -->
            </div>
            
            @else
            <div class="d-flex justify-content-between pt-3 pb-3">
                <a class=" text-success" style="font-size:20px" href="{{ url('/') }}">VIỆT HÀ</a>
                <a class= "btn-login"href="{{ url('login') }}">Đăng nhập</a>
            </div>
            
            @endif
            <!-- <div style="border-bottom: 1px solid #E5E5E5"></div> -->
            <div >
            <section class="d-flex justify-content-between pt-1 pb-1" style="font-size:12px">
                <div class="flex">
                    <a class="text-dark px-2 nav-link"  style="text-decoration:none"  href="{{ url('services') }}">Dịch vụ</a>                
                    <a class="text-dark px-2 nav-link"  style="text-decoration:none"  href="{{ url('rules') }}">Nội quy</a>          
                    <a class="text-dark px-2 nav-link"  style="text-decoration:none"  href="{{ url('about-us') }}">Về chúng tôi</a>    
                </div>
                <div >
                    <a href="tel:0912305179" class="me-4 text-reset">
                      <img src="{{ asset('img/zalo.png')}}" height="18px" alt="">

                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61555635878647" class="me-4 text-reset">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.facebook.com/messages/t/61555635878647" class="me-4 text-reset">
                     <i class="fa-brands fa-facebook-messenger"></i>
                    </a>
                    <a href="tel:0912305179" class="me-4 text-reset">
                     <i class="fa fa-phone"></i>
                    </a>
                  

                </div>
                <!-- Right -->
            </section>
            </div>
        </div>
    </footer>
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    const userInfo = document.getElementById('user-info');
    const avatar = document.querySelector('.img-avatar');
    console.log("hello");

    avatar.addEventListener('click', showInfo);
    function showInfo(e){
      if (userInfo.style.display === 'none' || userInfo.style.display === '') {
            userInfo.style.display = 'block';
        } else {
            userInfo.style.display = 'none';
        }
    }

});
</script>
</body>
</html>
