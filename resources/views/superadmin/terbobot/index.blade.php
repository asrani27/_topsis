@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Perhitungan 2. Normalisasi Terbobot</h5>
            </div>
            <div class="card-body table-border-style">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pegawai</th>
                            @foreach($kriterias as $kriteria)
                            <th>{{ $kriteria->nama }}<br><small>Bobot: {{ $kriteria->bobot }}%</small></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pegawais as $pegawai)
                        <tr>
                            <td>{{ $pegawai->nama }}</td>
                            @foreach($kriterias as $kriteria)
                            <td>{{ number_format($terbobot[$pegawai->id][$kriteria->id], 4) }}</td>
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