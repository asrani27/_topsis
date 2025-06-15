<?php

namespace App\Http\Controllers;

use App\Models\Kodefikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KodefikasiController extends Controller
{
    public function index()
    {
        $data = Kodefikasi::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.kodefikasi.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.kodefikasi.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Kodefikasi::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/kodefikasi');
    }
    public function edit($id)
    {
        $data = kodefikasi::find($id);
        return view('superadmin.kodefikasi.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Kodefikasi::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kodefikasi');
    }
    public function delete($id)
    {
        Kodefikasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/kodefikasi');
    }
}
