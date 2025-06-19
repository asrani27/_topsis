@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Perhitungan 5. Nilai Preferensi</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">

                        <a href="/superadmin/laporan/hasil" target="_blank" class="btn btn-danger">Print</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Pegawai</th>
                            <th>Jarak D⁺</th>
                            <th>Jarak D⁻</th>
                            <th>Preferensi (Vᵢ)</th>
                            <th>keterangan⁻</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasil as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ number_format($item['d_plus'], 4) }}</td>
                            <td>{{ number_format($item['d_minus'], 4) }}</td>
                            <td><strong>{{ number_format($item['preferensi'], 4) }}</strong></td>
                            <td>
                                @if (number_format($item['preferensi'] >= 0.8))
                                Sangat Baik
                                @endif
                                @if (number_format($item['preferensi'] >= 0.5) && number_format($item['preferensi'] <
                                    0.8)) Baik @endif @if (number_format($item['preferensi'] <=0.5)) Kurang Baik @endif
                                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection