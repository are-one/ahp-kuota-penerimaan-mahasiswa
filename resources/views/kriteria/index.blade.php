@extends('layouts.master')
@section ('title', 'SPK | Data Kriteria')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Data Kriteria</i></h6>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-md-12">

            <div class="bg-light rounded vh-100 p-4">
                <div class="row">
                    <div class="col-md-5">
                        {{Form::open(['url' => 'jadwalkuliah','method'=>'GET'])}}
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <td>Program Studi</td>
                                <td>{{Form::select('prodi', $prodi, null,['class'=>'form-control'])}}</td>
                            </tr>
                            <tr>
                                <td>Tahun Akademik</td>
                                <td>{{Form::select('tahun', $tahun, null,['class'=>'form-control'])}}</td>
                            </tr>
                            <tr>
                                <td>Tahun Akademik</td>
                                <td>{{Form::select('kriteria', $kriteria, null,['class'=>'form-control'])}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="/kriteria/create" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Input Kriteria</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-7">
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Nama Kriteria</th>
                                <th>Nilai Prioritas</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection