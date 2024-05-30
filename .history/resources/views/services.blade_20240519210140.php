@extends('frontlayout')
@section('content')
<section class="services">
    <div class="container">
        <h1 class="services-title">Bảng Dịch Vụ</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên Dịch Vụ</th>
                    <th>Giá Dịch Vụ</th>
                    <th>Mô Tả</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dichVus as $dichVu)
                    <tr>
                        <td>{{ $dichVu->tenDichVu }}</td>
                        <td>{{ $dichVu->giaDichVu }}</td>
                        <td>{{ $dichVu->moTa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
