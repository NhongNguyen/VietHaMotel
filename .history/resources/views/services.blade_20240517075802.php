@extends('frontlayout')
@section('content')
    <div class="container">
        <h1 style="text-align:center">Bảng Dịch Vụ</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Giá Dịch Vụ</th>
                    <th>Mô Tả</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dichVus as $dichVu)
                    <tr>
                        <td>{{ $dichVu->id }}</td>
                        <td>{{ $dichVu->tenDichVu }}</td>
                        <td>{{ $dichVu->giaDichVu }}</td>
                        <td>{{ $dichVu->moTa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
