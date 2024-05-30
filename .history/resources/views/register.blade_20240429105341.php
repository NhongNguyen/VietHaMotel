@extends('frontlayout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid container">

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
                                <form method="post" action="{{url('admin/khachthue')}}">
                                    @csrf
                                   
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                

@endsection