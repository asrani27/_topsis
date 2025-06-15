<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{

    public function index()
    {
        $data = Karyawan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.karyawan.index', compact('data'));
    }
    public function add()
    {
        $perusahaan = Perusahaan::get();
        return view('superadmin.karyawan.create', compact('perusahaan'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Karyawan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/karyawan');
    }
    public function edit($id)
    {
        $data = Karyawan::find($id);
        $perusahaan = Perusahaan::get();
        return view('superadmin.karyawan.edit', compact('data', 'perusahaan'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Karyawan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/karyawan');
    }
    public function delete($id)
    {
        Karyawan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/karyawan');
    }
}
