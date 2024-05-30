@extends('frontlayout')
@section('content')
    <div class="container">
        <h2>Nội quy</h2>
        <ul>
            @foreach($noiQuys as $noiQuy)
                <li>{{ $noiQuy->tenNoiQuy }} - {{ $noiQuy->moTa }}</li>
            @endforeach
        </ul>
    </div>
@endsection