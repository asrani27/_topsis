<?php

namespace App\Http\Controllers;

use App\Models\Dataumum;
use App\Models\Program;
use App\Models\Komponen;
use App\Models\Transaksi;
use App\Models\Pembiayaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.transaksi.index', compact('data'));
    }
    public function add()
    {
        $komponen = Komponen::get();
        $program = Program::get();
        $pembiayaan = Pembiayaan::get();
        $dataumum = Dataumum::get();
        return view('superadmin.transaksi.create', compact('komponen', 'program', 'pembiayaan', 'dataumum'));
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Transaksi::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/transaksi');
    }
    public function edit($id)
    {
        $komponen = Komponen::get();
        $program = Program::get();
        $pembiayaan = Pembiayaan::get();
        $data = Transaksi::find($id);
        $dataumum = Dataumum::get();
        return view('superadmin.transaksi.edit', compact('data', 'komponen', 'program', 'pembiayaan', 'dataumum'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Transaksi::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/transaksi');
    }
    public function delete($id)
    {
        Transaksi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/transaksi');
    }
}
