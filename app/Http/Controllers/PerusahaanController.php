<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerusahaanController extends Controller
{
    public function index()
    {
        $data = Perusahaan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.perusahaan.index', compact('data'));
    }
    public function add()
    {
        $jenis = Jenis::get();
        return view('superadmin.perusahaan.create', compact('jenis'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Perusahaan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/perusahaan');
    }
    public function edit($id)
    {
        $data = Perusahaan::find($id);
        $jenis = Jenis::get();
        return view('superadmin.perusahaan.edit', compact('data', 'jenis'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Perusahaan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/perusahaan');
    }
    public function delete($id)
    {
        Perusahaan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/perusahaan');
    }
}
