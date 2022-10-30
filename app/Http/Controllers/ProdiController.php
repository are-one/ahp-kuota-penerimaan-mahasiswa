<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prodi;
use DataTables;

class ProdiController extends Controller
{

    function json()
    {
        return Datatables::of(prodi::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/prodi/' . $row->kode_prodi . '/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'prodi/' . $row->kode_prodi, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }


    public function index()
    {
        return view('prodi.index');
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'kode_prodi' => 'required|unique:prodi|min:4',
            'nama_prodi' => 'required|min:6'
        ]);

        //menambahkan input data
        $prodi = new prodi();
        $prodi->create($request->all());
        return redirect('/prodi')->with('status', 'Data Prodi Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data['prodi'] = prodi::where('kode_prodi', $id)->first();
        return view('prodi.edit', $data);
    }

    public function update(Request $request, $kode_prodi)
    {
        $request->validate([
            'nama_prodi' => 'required|min:6',
        ]);


        $prodi = prodi::where('kode_prodi', '=', $kode_prodi);
        $prodi->update($request->except('_method', '_token'));
        return redirect('/prodi')->with('status', 'Data Prodi Berhasil Di Update');;
    }

    public function destroy($kode_prodi)
    {
        $prodi = prodi::where('kode_prodi', $kode_prodi);
        $prodi->delete();
        return redirect('/prodi')->with('status', 'Data Prodi Berhasil Dihapus');;
    }
}
