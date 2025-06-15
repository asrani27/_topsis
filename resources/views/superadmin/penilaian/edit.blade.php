@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data</h5>
        </div>
        <div class="card-body">
            <form action="/superadmin/penilaian/edit/{{ $pegawai->id }}" method="POST">
                @csrf
                <!-- karena edit -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="pegawai_id">Pegawai</label>
                            <select class="form-control" name="pegawai_id" required disabled>
                                @foreach (pegawai() as $pgw)
                                <option value="{{ $pgw->id }}" {{ $pgw->id == $pegawai->id ? 'selected' : '' }}>
                                    {{ $pgw->nama }}
                                </option>
                                @endforeach
                            </select>
                            <!-- Tambahkan hidden agar pegawai_id tetap ikut dikirim -->
                            <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                        </div>

                        @foreach (kriteria() as $krit)
                        @php
                        $nilaiLama = $pegawai->penilaians->firstWhere('kriteria_id', $krit->id)?->nilai ?? '';
                        @endphp
                        <div class="form-group">
                            <label class="floating-label">{{ $krit->nama }}</label>
                            <input type="text" class="form-control" name="nilai[{{ $krit->id }}]"
                                value="{{ $nilaiLama }}" onkeypress="return hanyaAngka(event)" required>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <a href="/superadmin/penilaian" class="btn btn-secondary">Kembali</a>
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