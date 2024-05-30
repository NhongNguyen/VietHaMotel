@extends('frontlayout')
@section('content')
    <div class="container" style="height:500px;">
        <h1 style="text-align:center">Dịch vụ</h1>
        <ul>
            @foreach($dichVus as $dichVu)
                <li>
                    <strong>{{ $dichVu->tenDichVu }}</strong> - Giá: {{ $dichVu->giaDichVu }} VNĐ
                    <p>{{ $dichVu->moTa }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
