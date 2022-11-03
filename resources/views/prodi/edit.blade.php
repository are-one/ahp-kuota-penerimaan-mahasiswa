@extends('layouts.master')
@section ('title', 'SPK | Tambah Data Prodi')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Tambah Data Prodi</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <div class="table-responsive">
                    <div class="card-body">
                        @include('validation_error')
                        {{ Form::model($prodi,['url'=>'prodi/'.$prodi->kode_prodi,'method'=>'PUT'])}}
                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Kode Prodi</label>
                            <div class="col-md-3">
                                {{ Form::text('kode_prodi',null,['class'=>'form-control','placeholder'=>'Kode Prodi'])}}
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Nama Prodi</label>
                            <div class="col-md-4">
                                {{Form::text('nama_prodi',null,['class' => 'form-control','placeholder' => 'Nama Dosen'])}}
                            </div>
                        </div><br>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-2">
                                {{Form::submit('Simpan Data',['class' => 'btn btn-sm btn-success'])}}
                                <a href="/prodi" class="btn btn-sm btn-warning"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection