@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Perhitungan 1. Normalisasi Matriks</h5>
            </div>
            <div class="card-body table-border-style">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pegawai</th>
                            @foreach($kriterias as $kriteria)
                            <th>{{ $kriteria->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                        <tr>
                            <td>{{ $pegawai->nama }}</td>
                            @foreach($kriterias as $kriteria)
                            <td>{{ number_format($normalisasi[$pegawai->id][$kriteria->id], 4) }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection