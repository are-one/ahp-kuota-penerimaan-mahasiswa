@extends('layouts.master')
@section ('title', 'SPK | Data Kriteria')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Data Prodi</i></h6>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="bg-light rounded p-4">
            <div class="col-md-12">
                <a href="/prodi" class="btn btn-sm btn-warning mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button class="btn btn-sm btn-primary mb-3"><i class="fas fa-upload"></i> Update</button>
                <button class="btn btn-sm btn-danger mb-3"><i class="fas fa-random"></i> Reset Nilai</button>
                <table class="table table-bordered">
                    <tr>
                        <th width="200">Kode Prodi</th>
                        <th>&nbsp; <i>{{$prodi->kode_prodi}}</i></th>
                    </tr>
                    <tr>
                        <th width="200">Nama Prodi</th>
                        <th>&nbsp;<i>{{$prodi->nama_prodi}}</i></th>
                    </tr>
                </table>
                <h5 class="mb-3"><i>Kriteria</i></h5>
                <form class="row g-4 mb-3" action="" method="GET">
                    <div class="col">
                        <select name="id_tahun" class="form-select">
                            <option value="">Pilih Tahun ...</option>
                            @foreach ($tahun as $id_thn => $tahun)
                                <option value="{{$id_thn}}" {{ ($id_thn == $id_tahun)? "selected" : "" }}>{{$tahun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        
                                <button type="submit" class="btn btn-info"><i class="fas fa-search"></i>
                                    Cari Data</button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-add"><i class=" fas fa-plus-square"></i> Input Kriteria</button>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Prodi</th>
                            <th>Nama Kriteria</th>
                            <th>Nilai </th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($kriteria1 as $krt)
                            <tr>
                                <td>{{$prodi->kode_prodi}}</td>
                                <td>{{$krt->nama_kriteria}}</td>
                                <td>{{ isset($prodi_has_kriteria[$krt->id])? $prodi_has_kriteria[$krt->id] : 0 }}</td>
                            </tr>
                            @endforeach                            
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            @include('validation_error')
            <form name="frm_add" id="frm_add" class="form-horizontal" action="{{route('simpandata')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content ">
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title">Input Nilai Kriteria</h4>
                    </div>
                    <div class="modal-body">
                        
                                {{{Form::hidden('id_tahun', $id_tahun,[]) }}}
                                {{{Form::hidden('kode_prodi', $prodi->kode_prodi,[]) }}}


                        @foreach($kriteria as $id => $nama_kriteria)
                        <div class="row col-md-12">
                            <label class="col-md-4 col-form-label text-md-right mb-3">{{$nama_kriteria}}</label>
                            <div class="col-md-8">
                                {{ Form::number($id, (isset($prodi_has_kriteria[$id])? $prodi_has_kriteria[$id] : 0),['class'=>'form-control'])}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection