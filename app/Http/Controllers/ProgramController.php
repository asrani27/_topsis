<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProgramController extends Controller
{
    public function index()
    {
        $data = Program::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.program.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.program.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Program::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/program');
    }
    public function edit($id)
    {
        $data = program::find($id);
        return view('superadmin.program.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Program::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/program');
    }
    public function delete($id)
    {
        Program::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/program');
    }
}
