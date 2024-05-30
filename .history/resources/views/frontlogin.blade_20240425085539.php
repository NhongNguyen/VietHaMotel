@extends('frontlayout')
@section('content')

<div class="container my-4">
	<!-- <h3 class="mb-3">Đăng nhập</h3> -->
	@if(Session::has('error'))
	<p class="text-danger">{{session('error')}}</p>
	@endif
	<!-- <form method="post" action="{{url('customer/login')}}">
		@csrf
		<table class="table table-bordered">
			<tr>
				<th>Email</th>
				<td><input required type="text" class="form-control" name="SDT"></td>
			</tr>
			<tr>
				<th>Mật khẩu</th>
				<td><input required type="password" class="form-control" name="matKhau"></td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" class="btn btn-primary" /></td>
			</tr>
		</table>
		
	</form> -->
</div>

@endsection
