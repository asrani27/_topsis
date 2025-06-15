@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/laporkerja/add">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">Nomor</label>
                            <input type="text" class="form-control" name="nomor" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label">Perusahaan</label>
                            <select class="form-control" name="perusahaan_id">
                                <option value="">-</option>
                                @foreach ($perusahaan as $item)
                                <option value="{{$item->id}}">{{$item->nama_usaha}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">masa berlaku</label>
                            <input type="text" class="form-control" name="masa_berlaku" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Jumlah Karyawan</label>
                            <input type="text" class="form-control" name="jumlah_karyawan" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/superadmin/laporkerja" class="btn btn-secondary">Kembali</a>
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