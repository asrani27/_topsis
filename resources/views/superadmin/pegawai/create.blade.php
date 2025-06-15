@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/pegawai/add">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">NIK pegawai</label>
                            <input type="text" class="form-control" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">NAMA pegawai</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">jabatan</label>
                            <input type="text" class="form-control" name="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Telp</label>
                            <input type="text" class="form-control" name="telp" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Jkel</label>
                            <select class="form-control" name="jkel">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Agama</label>
                            <select class="form-control" name="agama">
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDDHA">BUDDHA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/superadmin/pegawai" class="btn btn-secondary">Kembali</a>
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