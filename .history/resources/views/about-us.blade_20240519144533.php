@extends('frontlayout')
@section('content')
    <!-- Hiển thị thông tin về phòng trọ -->
<style>
  .aboutus{
    font-family: "Quicksand", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    font-weight: 500;
  }
  h1{
    font-family: "Quicksand", sans-serif;
  font-optical-sizing: auto;
  font-weight: 700;
  font-style: normal;
  }
  .aboutus-row{
    display: flex; 
  }
  .aboutus-content{
    padding:30px;
  }
  .aboutus-column{
    position: relative;
  }
  .aboutus-column-title{
    position: absolute;
    z-index: 1;
  }
  .aboutus-img{
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9));
    opacity: 0.3;
    z-index: 0;
  }
</style>
<section class="aboutus">
  <div class="container">
    <div class="aboutus-row">
      <div class="aboutus-column">
        <h1 class="aboutus-column-title">VỀ CHÚNG TÔI</h1>
        <img class="aboutus-img" src="{{ asset('img/VietHa.jpg')}}" height="500px" alt="VietHa">  
      </div>
      <div class="aboutus-content">
          <p>Nhà Trọ Việt Hà là một địa chỉ phòng trọ đáng tin cậy tại thành phố Nha Trang, tỉnh Khánh Hòa. Với vị trí thuận lợi tại số 110 Nguyễn Đình Chiểu, phường Vĩnh Thọ, nhà trọ này cung cấp một môi trường sống thoải mái và tiện nghi cho sinh viên, người lao động và du khách.
          Nhà Trọ Việt Hà không chỉ cung cấp những căn phòng tiện nghi với đầy đủ các trang thiết bị cần thiết mà còn chú trọng đến việc tạo ra một không gian sống an toàn và thoải mái cho các cư dân. Đội ngũ quản lý chuyên nghiệp luôn sẵn sàng hỗ trợ và giải quyết mọi vấn đề của khách hàng một cách nhanh chóng và hiệu quả.
          Với sứ mệnh cung cấp dịch vụ nhà ở chất lượng và an toàn, Nhà Trọ Việt Hà cam kết đem lại trải nghiệm sống tốt nhất cho mọi khách hàng, từ việc quản lý thông tin phòng trọ đến dịch vụ hỗ trợ và tiện ích xung quanh.
          </p>
      </div>
    </div>
  </div>
</section>
@endsection
