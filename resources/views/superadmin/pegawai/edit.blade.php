@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/pegawai/edit/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">NIK pegawai</label>
                            <input type="text" class="form-control" name="nik" value="{{$data->nik}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">NAMA pegawai</label>
                            <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">jabatan pegawai</label>
                            <input type="text" class="form-control" name="jabatan" value="{{$data->jabatan}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required value="{{$data->alamat}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Telp</label>
                            <input type="text" class="form-control" name="telp" required value="{{$data->telp}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Jkel</label>
                            <select class="form-control" name="jkel">
                                <option value="L" {{$data->jkel == 'L' ?
                                    'selected':''}}>Laki-Laki</option>
                                <option value="P" {{$data->jkel == 'P' ?
                                    'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">agama</label>
                            <select class="form-control" name="agama">
                                <option value="ISLAM" {{$data->pendidikan == 'ISLAM' ?
                                    'selected':''}}>ISLAM</option>
                                <option value="KRISTEN" {{$data->pendidikan == 'KRISTEN' ?
                                    'selected':''}}>KRISTEN</option>
                                <option value="HINDU"> {{$data->pendidikan == 'HINDU' ?
                                    'selected':''}}HINDU</option>
                                <option value="BUDDHA" {{$data->pendidikan == 'BUDDHA' ?
                                    'selected':''}}>BUDDHA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
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