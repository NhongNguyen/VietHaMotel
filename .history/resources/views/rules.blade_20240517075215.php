@extends('frontlayout')
@section('content')
    <div class="container">
        <h1>Nội quy</h1>
        <ul>
            @foreach($noiQuys as $noiQuy)
                <li>{{ $noiQuy->tenNoiQuy }} - {{ $noiQuy->moTa }}</li>
            @endforeach
        </ul>
    </div>
@endsection