<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
    <link href="{{ asset('bs5/bootstrap.min.css') }}" rel="stylesheet" />
		<script type="text/javascript" src="{{ asset('bs5/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<!-- <link href="{{asset('public/bs5/bootstrap.min.css')}}" rel="stylesheet" /> -->
	<!-- <script type="text/javascript" src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/bs5/bootstrap.bundle.min.js')}}"></script> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    h1{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }


/* CSS cho main content */
main {
  flex-grow: 1;
}

/* CSS cho footer */
footer {
  flex-shrink: 0;
}
body {
  font-family: "Poppins", sans-serif;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
    margin-top:30px;
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}
/* CSS cho trường Mật khẩu */
input[type=password] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=password]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=password]::placeholder {
  color: #cccccc;
}

/* CSS cho trường Ngày sinh */
input[type=date],input[type="number"] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=date]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

/* CSS cho trường Giới tính */
select[name=gioiTinh] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align-last: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

select[name=gioiTinh]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}
input[type=file] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=file]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

.formlogin{
  position: relative;
}
.fa-eye,
.fa-eye-slash {
  position: absolute;
  right:0;
  margin-top:25px;
  margin-right:50px;
  cursor: pointer;
}
@media (max-width: 991.98px) { /* Responsive từ tablet trở xuống */
    .navbar-collapse {
        display: flex;
        align-items: center; /* Căn giữa theo chiều dọc */
    }

    .img-avatar {
        margin-right: 10px; /* Đặt margin giữa avatar và nút toggle */
    }
}
</style>

<body style="background-color: #E1E1E1;">

<nav class="navbar navbar-expand-lg navbar navbar-light" style="position:fixed;top:0;width:100%;z-index:10; background-color: #E1E1E1;">
    <div class="container">
     
        @if(session()->has('khachthuelogin') && session('khachthuelogin')->phongTro)
            <!-- Render the text without hyperlink if the tenant has a room -->
            <span class="navbar-brand text-success" style="font-size:20px">VIỆT HÀ</span>
        @else
            <!-- Render the hyperlink if the tenant does not have a room -->
            <a class="navbar-brand text-success" style="font-size:20px" href="{{ url('/') }}">VIỆT HÀ</a>
        @endif        
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
                    <a type="button" class="btn btn-secondary nav-link text-dark text-white" href="{{ url('register') }}">Đăng kí</a>
                    <a type="button" class="btn btn-primary nav-link text-dark text-white mx-2" href="{{ url('login') }}">Đăng nhập</a>
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
                <div class=" text-success" style="text-decoration:none; font-size:20px" href="{{ url('/') }}">VIỆT HÀ</div>
                <!-- <div class= "text-light" style="font-size:12px;background-color:#111B47; text-decoration:none; padding:5px 20px; align-self:center;" href="{{ url('login') }}">Đăng nhập</div> -->
            </div>
            
            @else
            <div class="d-flex justify-content-between pt-3 pb-3">
                <a class=" text-success" style="text-decoration:none; font-size:20px" href="{{ url('/') }}">VIỆT HÀ</a>
                <a class= "text-light" style="font-size:12px;background-color:#111B47; text-decoration:none; padding:5px 20px; align-self:center;" href="{{ url('login') }}">Đăng nhập</a>
            </div>
            
            @endif
            <div style="border-bottom: 1px solid #E5E5E5"></div>
            <div class="">
            <section class="d-flex justify-content-between pt-1 pb-1" style="font-size:12px">
                <div class="flex">
                    <a class="text-dark px-2"  style="text-decoration:none"  href="{{ url('services') }}">Dịch vụ</a>                
                    <a class="text-dark px-2"  style="text-decoration:none"  href="{{ url('rules') }}">Nội quy</a>          
                    <a class="text-dark px-2"  style="text-decoration:none"  href="{{ url('about-us') }}">Về chúng tôi</a>    
                </div>
                <div style="padding-bottom:20px;">
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
