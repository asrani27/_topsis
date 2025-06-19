@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data penilaian</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">


                        <a href="/superadmin/laporan/penilaian" target="_blank" class="btn btn-danger">Print</a>

                        <a href="/superadmin/penilaian/add" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pegawai</th>
                                @foreach (kriteria() as $kriteria)
                                <th>{{ $kriteria->nama }}</th>
                                @endforeach
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (pegawai() as $pegawai)
                            <tr>
                                <td>{{ $pegawai->nama }}</td>
                                @foreach (kriteria() as $kriteria)
                                @php
                                $nilai = $pegawai->penilaians->firstWhere('kriteria_id', $kriteria->id)?->nilai ?? '-';
                                @endphp
                                <td>{{ $nilai }}</td>
                                @endforeach
                                <td>
                                    <a href="/superadmin/penilaian/edit/{{$pegawai->id}}"
                                        class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="/superadmin/penilaian/delete/{{$pegawai->id}}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin dihapus?');"><i
                                            class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection