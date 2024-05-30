@extends('frontlayout')
@section('content')
<section class="rules">
    <div class="container">
        <h1>Nội quy</h1>
        <table class="table rules-table">
            <thead>
                <tr>
                    <th>Tên Nội Quy</th>
                    <th>Mô Tả</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noiQuys as $noiQuy)
                    <tr>
                        <td>{{ $noiQuy->tenNoiQuy }}</td>
                        <td>{{ $noiQuy->moTa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
   
@endsection
