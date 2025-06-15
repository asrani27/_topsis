@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data perusahaan</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">

                        <a href="/superadmin/perusahaan/add" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Nama Usaha</th>
                                <th>Nama Pimpinan</th>
                                <th>Jumlah Karyawan</th>
                                <th>Status Karyawan</th>
                                <th>Nama Pemilik</th>
                                <th>Alamat Pemilik</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $item)
                            <tr>
                                <td>{{$data->firstItem() + $key}}</td>
                                <td>{{$item->jenis == null ? '': $item->jenis->nama}}</td>
                                <td>{{$item->nama_usaha}}</td>
                                <td>{{$item->nama_pimpinan}}</td>
                                <td>{{$item->jumlah_karyawan}}</td>
                                <td>{{$item->status_karyawan}}</td>
                                <td>{{$item->nama_pemilik}}</td>
                                <td>{{$item->alamat_pemilik}}</td>
                                <td>
                                    <a href="/superadmin/perusahaan/edit/{{$item->id}}"
                                        class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="/superadmin/perusahaan/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin dihapus?');"><i
                                            class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                        {{$data->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection