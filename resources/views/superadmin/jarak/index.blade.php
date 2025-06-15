@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Perhitungan 4. Jarak Ideal</h5>
            </div>
            <div class="card-body table-border-style">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pegawai</th>
                            <th>Jarak D⁺ (Ideal Positif)</th>
                            <th>Jarak D⁻ (Ideal Negatif)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jarak as $item)
                        <tr>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ number_format($item['d_plus'], 4) }}</td>
                            <td>{{ number_format($item['d_minus'], 4) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection