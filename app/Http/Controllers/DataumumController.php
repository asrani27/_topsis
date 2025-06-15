<?php

namespace App\Http\Controllers;

use App\Models\Dataumum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataumumController extends Controller
{
    public function index()
    {
        $data = Dataumum::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.dataumum.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.dataumum.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Dataumum::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/dataumum');
    }
    public function edit($id)
    {
        $data = Dataumum::find($id);
        return view('superadmin.dataumum.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Dataumum::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/dataumum');
    }
    public function delete($id)
    {
        Dataumum::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/dataumum');
    }
}
