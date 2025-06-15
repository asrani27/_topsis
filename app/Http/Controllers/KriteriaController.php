<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{

    public function index()
    {
        $data = Kriteria::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.kriteria.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.kriteria.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Kriteria::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/kriteria');
    }
    public function edit($id)
    {
        $data = Kriteria::find($id);
        return view('superadmin.kriteria.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Kriteria::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kriteria');
    }
    public function delete($id)
    {
        Kriteria::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/kriteria');
    }
}
