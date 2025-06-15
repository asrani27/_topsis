@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Perhitungan 3. Solusi Ideal</h5>
            </div>
            <div class="card-body table-border-style">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            @foreach($kriterias as $kriteria)
                            <th>{{ $kriteria->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Ideal Positif (A⁺)</strong></td>
                            @foreach($kriterias as $kriteria)
                            <td>{{ number_format($idealPositif[$kriteria->id], 4) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><strong>Ideal Negatif (A⁻)</strong></td>
                            @foreach($kriterias as $kriteria)
                            <td>{{ number_format($idealNegatif[$kriteria->id], 4) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection