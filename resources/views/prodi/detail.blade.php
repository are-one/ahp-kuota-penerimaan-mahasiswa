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
                <button type="button" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modal-add"><i class=" fas fa-plus-square"></i> Input Kriteria</button>
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
                            @foreach ($prioritas as $kode => $nama)
                            <td>{{$nama}}</td>
                            @endforeach
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
                        <div class="row col-md-12">
                            <label class="col-md-4 col-form-label text-md-right mb-3">Nama Prodi</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="kode_prodi" value="{{$prodi->kode_prodi}}" readonly>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <label class="col-md-4 col-form-label text-md-right mb-3">nama</label>
                            <div class="col-md-8">
                                {{ Form::select('kriteria_id', null,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <label class="col-md-4 col-form-label text-md-right mb-3">Nilai</label>
                            <div class="col-md-8">
                                {{ Form::number('nilai', null,['class'=>'form-control', 'placeholder' => 'Inputkan Nilai'])}}
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <label class="col-md-4 col-form-label text-md-right mb-3">Tahun Akademik</label>
                            <div class="col-md-8">
                                {{ Form::select('tahun_id_tahun', $tahun, null,['class'=>'form-control'])}}
                            </div>
                        </div>
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