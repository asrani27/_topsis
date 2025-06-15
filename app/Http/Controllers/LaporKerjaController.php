<?php

namespace App\Http\Controllers;

use App\Models\LaporKerja;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LaporKerjaController extends Controller
{
    public function index()
    {
        $data = LaporKerja::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.laporkerja.index', compact('data'));
    }
    public function add()
    {
        $perusahaan = Perusahaan::get();
        return view('superadmin.laporkerja.create', compact('perusahaan'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        LaporKerja::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/laporkerja');
    }
    public function edit($id)
    {
        $data = LaporKerja::find($id);
        $perusahaan = Perusahaan::get();
        return view('superadmin.laporkerja.edit', compact('data', 'perusahaan'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        LaporKerja::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/laporkerja');
    }
    public function delete($id)
    {
        LaporKerja::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/laporkerja');
    }
}
