<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use App\prodi;
use App\prodihaskriteria;
use App\Tahunakademik;
use DataTables;
use Illuminate\Support\Facades\Input;

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
<<<<<<< HEAD

        $prioritas = [
            'K01' => 0,
        ];
        $kriteria1 = Kriteria::all();
        $kriteria['kriteria'] = Kriteria::pluck('nama_kriteria', 'id');
        $data['tahun'] = Tahunakademik::pluck('tahun_akademik', 'id_tahun');
        $data['prodi'] = prodi::where('kode_prodi', $id)->first();
        // ambil data dari tabel prodi has kriteria filter bedasarkan prodi
        return view('prodi.detail', ['prioritas' => $prioritas, 'kriteria' => $kriteria, 'kriteria1' => $kriteria1], $data);
=======
        $id_tahun = Input::get('id_tahun', 0);
        $tahun = Tahunakademik::where('id_tahun', $id_tahun)->first();

        if($tahun != null){
            // $phk = \DB::table('prodi_has_kriteria')
            //     ->join('prodi', 'prodi.kode_prodi', '=', 'prodi_has_kriteria.kode_prodi')
            //     ->join('kriteria', 'kriteria.id', '=', 'prodi_has_kriteria.kriteria_id')
            //     ->join('tahun', 'tahun.id_tahun', '=', 'prodi_has_kriteria.tahun_id_tahun')
            //     ->first();
            $phk = prodihaskriteria::where([['kode_prodi', '=', $id],['tahun_id', '=', $id_tahun]])->pluck('nilai','kriteria_id');
        }else{
            $phk = [];
        }

        $kriteria1 = Kriteria::all();
        $kriteria = Kriteria::pluck('nama_kriteria', 'id');

        $data['prodi_has_kriteria'] = $phk;

        $data['tahun'] = Tahunakademik::pluck('tahun_akademik', 'id_tahun');
        $data['prodi'] = prodi::where('kode_prodi', $id)->first();

        return view('prodi.detail', ['kriteria' => $kriteria, 'kriteria1' => $kriteria1, 'id_tahun' => $id_tahun], $data);
>>>>>>> d27c8f2e49c0eb9f711d34bc855c2a5ac966be6a
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
        $data_request = $request->post();
        $kode_prodi = $data_request['kode_prodi'];
        $tahun =  $data_request['id_tahun'];

        unset($data_request['kode_prodi']);
        unset($data_request['id_tahun']);
        unset($data_request['_token']);
        
        $prodi = prodi::find($kode_prodi);
        
        if(count($prodi->prodiHasKriterias()->where('tahun_id', $tahun)->get()) > 0){
            foreach ($data_request as $kriteria_id => $nilai) {
                $phk_update = prodihaskriteria::where([
                    ['kode_prodi', '=', $kode_prodi],
                    ['kriteria_id', '=', $kriteria_id],
                    ['tahun_id', '=', $tahun]
                ]);

                $phk_update->update(['nilai' => $nilai]);
            }
        }else{
            
            $data_save = [];
            foreach ($data_request as $id_kriteria => $nilai_kriteria) {
                $data_save[] = new prodihaskriteria(['kriteria_id' => $id_kriteria, 'tahun_id' => $tahun, 'nilai' => $nilai_kriteria]);
            }
    
            // dd($data_save);
            $prodi->prodiHasKriterias()->saveMany($data_save);
        }

        return redirect('prodi/'.$kode_prodi.'?id_tahun='.$tahun)->with('status', 'Data Prodi Berhasil Disimpan');
    }
}
