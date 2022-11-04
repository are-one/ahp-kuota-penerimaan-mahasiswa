<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use App\prodi;
use DataTables;

class ProdiController extends Controller
{

    function json()
    {
        return Datatables::of(prodi::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/prodi/' . $row->kode_prodi . ' " class="btn btn-primary btn-sm" style="float:left"><i class="fas fa-eye"></i></a>';
                $action  = $action .  '<a href="/prodi/' . $row->kode_prodi . '/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>';
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

    public function show($id)
    {

        $prioritas = [
            'K01' => 0,
        ];
        $kriteria = Kriteria::all();
        $data['prodi'] = prodi::where('kode_prodi', $id)->first();
        return view('prodi.detail', ['prioritas' => $prioritas, 'kriteria' => $kriteria], $data);
    }


    public function update(Request $request, $kode_prodi)
    {
        $request->validate([
            'kode_prodi' => 'required|unique:prodi|min:4',
            'nama_prodi' => 'required|min:6'
        ]);


        $prodi = prodi::where('kode_prodi', '=', $kode_prodi);
        $prodi->update($request->except('_method', '_token'));
        return redirect('/prodi')->with('status', 'Data Prodi Berhasil Di Update');
    }

    public function destroy($kode_prodi)
    {
        $prodi = prodi::where('kode_prodi', $kode_prodi);
        $prodi->delete();
        return redirect('/prodi')->with('status', 'Data Prodi Berhasil Dihapus');
    }

    public function simpandata(Request $request)
    {
        $kriteria = new Kriteria();
        $kriteria->nilai_prioritas = $request->addNilaiPrioritas;
        $kriteria->id = $request;
        $kriteria->nama_kriteria = $request;
        $kriteria->save();
        return redirect('prodi.detail')->with('status', 'Data Prodi Berhasil Disimpan');
    }
}
