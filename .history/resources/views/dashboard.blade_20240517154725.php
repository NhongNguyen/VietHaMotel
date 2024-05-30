@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Phòng thuê</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\PhongTros::count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Khách thuê</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{App\Models\KhachThues::count()}}</div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Đã đặt phòng thuê</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ App\Models\PhongTros::where('tinhTrang', 'Hết Phòng')->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Phòng thuê</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php
                                    // Số lượng phòng đã thuê
                                    $soPhongDaThue = App\Models\PhongTros::where('tinhTrang', 'Hết Phòng')->count();
                                    // Tổng số lượng phòng có sẵn
                                    $tongSoPhong = App\Models\PhongTros::count();
                                    // Tính phần trăm
                                    $phanTram = ($soPhongDaThue / $tongSoPhong) * 100;
                                    // Hiển thị phần trăm
                                    echo number_format($phanTram, 2) . '%';
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: " aria-valuenow="{{ $phanTram }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
                <!-- /.container-fluid -->

<!-- Page level plugins -->
<script src="{{asset('public')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('public')}}/js/demo/chart-pie-demo.js"></script>

@endsection