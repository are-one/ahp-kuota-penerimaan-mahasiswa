@extends('layouts.master')
@section ('title', 'SPK | Tambah Data Ruangan')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Tambah Data Ruangan</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <div class="table-responsive">
                    <div class="card-body">
                        {{Form::open(['url' => 'ruangan'])}}


                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Ruangan</label>
                            <div class="col-md-3">
                                {{Form::text('ruangan',null,['class' => 'form-control','placeholder' => 'Ruangan'])}}
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Kapasitas</label>
                            <div class="col-md-4">
                                {{Form::text('kapasitas',null,['class' => 'form-control','placeholder' => 'Kapasitas'])}}
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">
                                {{Form::submit('Simpan Data',['class' => 'btn btn-sm btn-success'])}}
                                <a href="/ruangan" class="btn btn-sm btn-warning">Kembali</a>
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