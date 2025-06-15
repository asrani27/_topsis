<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('superadmin.penilaian.index');
    }

    public function add()
    {
        return view('superadmin.penilaian.create', [
            'pegawai' => Pegawai::all(),
            'kriteria' => Kriteria::all()
        ]);
    }

    public function store(Request $request)
    {
        $pegawaiId = $request->input('pegawai_id');
        $nilaiArray = $request->input('nilai'); // [kriteria_id => nilai]

        foreach ($nilaiArray as $kriteriaId => $nilai) {
            Penilaian::updateOrCreate(
                ['pegawai_id' => $pegawaiId, 'kriteria_id' => $kriteriaId],
                ['nilai' => $nilai]
            );
        }
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/penilaian');
    }
    public function edit($id)
    {
        return view('superadmin.penilaian.edit', [
            'pegawai' => Pegawai::with('penilaians')->findOrFail($id),
            'pegawaiList' => Pegawai::all(),
            'kriteria' => Kriteria::all(),
        ]);
    }
    public function update(Request $request, $pegawaiId)
    {
        foreach ($request->nilai as $kriteriaId => $nilai) {
            Penilaian::updateOrCreate(
                ['pegawai_id' => $pegawaiId, 'kriteria_id' => $kriteriaId],
                ['nilai' => $nilai]
            );
        }
        Session::flash('success', 'Berhasil Diupdate');

        return redirect('/superadmin/penilaian');
    }
    public function delete($id)
    {
        Penilaian::where('pegawai_id', $id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/penilaian');
    }
}
