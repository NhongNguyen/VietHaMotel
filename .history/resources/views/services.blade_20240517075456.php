@extends('frontlayout')
@section('content')
    <div class="container" style="height:500px;">
        <h1 style="text-align:center">Nội quy</h1>
        <ul>
            @foreach($dichVus as $dichVu)
                <li>{{ $dichVu->tendichVu }} - {{ $dichVu->moTa }}</li>
            @endforeach
        </ul>
    </div>
@endsection