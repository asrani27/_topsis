<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use App\Models\Pembiayaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PembiayaanController extends Controller
{
    public function index()
    {
        $data = Pembiayaan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.pembiayaan.index', compact('data'));
    }
    public function add()
    {
        $komponen = Komponen::get();
        return view('superadmin.pembiayaan.create', compact('komponen'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Pembiayaan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/pembiayaan');
    }
    public function edit($id)
    {
        $komponen = Komponen::get();
        $data = Pembiayaan::find($id);
        return view('superadmin.pembiayaan.edit', compact('data', 'komponen'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Pembiayaan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/pembiayaan');
    }
    public function delete($id)
    {
        Pembiayaan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/pembiayaan');
    }
}
