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
                        {{Form::open(['url' => 'Program Studi'])}}


                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Kode Prodi</label>
                            <div class="col-md-3">
                                {{Form::text('kode_prodi',null,['class' => 'form-control','placeholder' => 'Kode Prodi'])}}
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Nama Prodi</label>
                            <div class="col-md-4">
                                {{Form::text('nama_prodi',null,['class' => 'form-control','placeholder' => 'Nama Dosen'])}}
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Dosen Aktif</label>
                            <div class="col-md-3">
                                {{Form::text('dosen_aktif',null,['class' => 'form-control','placeholder' => 'Dosen Aktif'])}}
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Mahasiswa Aktif</label>
                            <div class="col-md-5">
                                {{Form::email('mahasiswa_aktif',null,['class' => 'form-control','placeholder' => 'Mahasiswa Aktif'])}}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                {{Form::submit('Simpan Data',['class' => 'btn btn-sm btn-success'])}}
                                <a href="/prodi" class="btn btn-sm btn-warning">Kembali</a>
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