<?php

namespace App\Http\Controllers;

use App\Tahunakademik;
use Illuminate\Http\Request;
use DataTables;

class TahunakademikController extends Controller
{

    function json()
    {
        return Datatables::of(Tahunakademik::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/tahun_akademik/' . $row->id_tahun . '/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'tahun_akademik/' . $row->id_tahun, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }


    public function index()
    {
        return view('tahun_akademik.index');
    }

    public function create()
    {
        return view('tahun_akademik.create');
    }

    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'id_tahun' => 'required|unique:tahun|min:4',
            'tahun_akademik' => 'required|unique:tahun|min:4'
        ]);

        //menambahkan input data
        $tahun = new Tahunakademik();
        $tahun->create($request->all());
        return redirect('/tahun_akademik')->with('status', 'Data Tahun Akademik Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data['tahun'] = Tahunakademik::where('id_tahun', $id)->first();
        return view('tahun_akademik.edit', $data);
    }

    public function update(Request $request, $id_tahun)
    {
        $request->validate([
            'id_tahun' => 'required|unique:tahun|min:4',
            'tahun_akademik' => 'required|unique:tahun|min:4'
        ]);


        $tahun = Tahunakademik::where('id_tahun', '=', $id_tahun);
        $tahun->update($request->except('_method', '_token'));
        return redirect('/tahun_akademik')->with('status', 'Data Tahun Berhasil Di Update');
    }

    public function destroy($id_tahun)
    {
        $Tahun = Tahunakademik::where('id_tahun', $id_tahun);
        $Tahun->delete();
        return redirect('/tahun_akademik')->with('status', 'Data Tahun Akademik Berhasil Dihapus');
    }
}
