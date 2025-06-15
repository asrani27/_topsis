@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data</h5>
        </div>
        <div class="card-body">
            <form action="/superadmin/penilaian/add" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="Email">Pegawai</label>
                            <select class="form-control" name="pegawai_id" required>
                                @foreach ($pegawai as $pegawai)
                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                @endforeach
                            </select>

                        </div>
                        @foreach ($kriteria as $kriteria)
                        <div class="form-group">
                            <label class="floating-label" for="Email">{{ $kriteria->nama }}</label>

                            <input type="text" class="form-control" name="nilai[{{ $kriteria->id }}]"
                                onkeypress="return hanyaAngka(event)" required>
                        </div>
                        @endforeach

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
<script>
    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>
@endpush