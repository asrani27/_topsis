<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KomponenController extends Controller
{
    public function index()
    {
        $data = Komponen::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.komponen.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.komponen.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Komponen::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/komponen');
    }
    public function edit($id)
    {
        $data = Komponen::find($id);
        return view('superadmin.komponen.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Komponen::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/komponen');
    }
    public function delete($id)
    {
        Komponen::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/komponen');
    }
}
