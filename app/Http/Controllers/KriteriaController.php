<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prodi;
use App\Tahunakademik;
use App\Kriteria;
use App\NilaiPerbandingan;
use App\prodihaskriteria;
use DataTables;


class KriteriaController extends Controller
{
    function json()
    {
        return Datatables::of(Kriteria::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/kriteria/' . $row->id . ' " class="btn btn-primary btn-sm" style="float:left"><i class="fas fa-pencil-alt"></i></a>';
                $action .= \Form::open(['url' => 'kriteria/' . $row->id, 'method' => 'delete', 'style' => 'float:right']);
                $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
                $action .= \Form::close();
                return $action;
            })->make(true);
    }

    public function index()
    {
        $data['prodi'] = prodi::pluck('nama_prodi', 'kode_prodi');
        $data['tahun'] = Tahunakademik::pluck('tahun_akademik', 'id_tahun');
        return view('kriteria.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:kriteria|max:2',
            'nama_kriteria' => 'required|min:3'
        ]);

        //menambahkan input data
        $kriteria = new Kriteria();
        $kriteria->create($request->all());
        return redirect('/kriteria')->with('status', 'Data Kriteria Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $data['kriteria'] = Kriteria::where('id', $id)->first();
        return view('kriteria.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'id' => 'required|min:1',
            'nama_kriteria' => 'required|min:3'
        ]);


        $kriteria = Kriteria::where('id', '=', $id);
        $kriteria->update($request->except('_method', '_token'));
        return redirect('/kriteria')->with('status', 'Data Kriteria Berhasil Di Update');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::where('id', $id);

        $prodi_has_kriteria = prodihaskriteria::where('kriteria_id', $id);
        $nilai_perbandingan_kriteria = NilaiPerbandingan::where('kriteria_id', $id);
        $nilai_perbandingan_kriteria1 = NilaiPerbandingan::where('kriteria_id1', $id);
        
        $prodi_has_kriteria->delete();
        $nilai_perbandingan_kriteria->delete();
        $nilai_perbandingan_kriteria1->delete();

        $kriteria->delete();
        return redirect('/kriteria')->with('status', 'Data Kriteria Berhasil Dihapus');
    }
}
