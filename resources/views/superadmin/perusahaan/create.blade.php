@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/perusahaan/add">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Jenis Usaha</label>
                            <select class="form-control" name="jenis_id">
                                <option value="">-</option>
                                @foreach ($jenis as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Nama Usaha</label>
                            <input type="text" class="form-control" name="nama_usaha" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Nama Pimpinan</label>
                            <input type="text" class="form-control" name="nama_pimpinan" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Jumlah Karyawan</label>
                            <input type="text" class="form-control" name="jumlah_karyawan" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Status Karyawan</label>
                            <input type="text" class="form-control" name="status_karyawan" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Nama Pemilik</label>
                            <input type="text" class="form-control" name="nama_pemilik" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">ALamat Pemilik</label>
                            <input type="text" class="form-control" name="alamat_pemilik" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Nama Pengurus</label>
                            <input type="text" class="form-control" name="nama_pengurus" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">ALamat Pengurus</label>
                            <input type="text" class="form-control" name="alamat_pengurus" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Status Perusahaan</label>
                            <input type="text" class="form-control" name="status_perusahaan" required>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Email">ALamat Perusahaan</label>
                            <input type="text" class="form-control" name="alamat_perusahaan" required>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Email">Telp Perusahaan</label>
                            <input type="text" class="form-control" name="telp_perusahaan" required>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Email">Status Pemilik</label>
                            <input type="text" class="form-control" name="status_pemilik" required>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Email">Tanggal berdiri Perusahaan</label>
                            <input type="date" class="form-control" name="tanggal_berdiri"
                                value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                        </div>





                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/superadmin/perusahaan" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush