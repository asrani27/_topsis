@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/kriteria/edit/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">nama kriteria</label>
                            <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">jenis</label>
                            <select class="form-control" name="jenis">
                                <option value="benefit" {{$data->jenis == 'benefit' ?
                                    'selected':''}}>Laki-Laki</option>
                                <option value="cost" {{$data->jenis == 'cost' ?
                                    'selected':''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">bobot</label>
                            <input type="text" class="form-control" name="bobot" required value="{{$data->bobot}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/superadmin/kriteria" class="btn btn-secondary">Kembali</a>
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