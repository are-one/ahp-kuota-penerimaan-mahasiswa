@extends('layouts.master')
@section ('title', 'SPK | Edit Data Prodi')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Edit Data Prodi</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-12">
            <div class="bg-light rounded p-4">
                <div class="table-responsive">
                    <div class="card-body">

                        {{ Form::model($tahun,['url'=>'tahun_akademik/'.$tahun->id_tahun,'method'=>'PUT'])}}
                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Kode Tahun</label>
                            <div class="col-md-2">
                                {{ Form::text('id_tahun',null,['class'=>'form-control','placeholder'=>'Kode Tahun'])}}
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Tahun Akademik</label>
                            <div class="col-md-2">
                                {{Form::text('tahun_akademik',null,['class' => 'form-control','placeholder' => 'Tahun Akademik'])}}
                            </div>
                        </div><br>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-2">
                                {{Form::submit('Simpan Data',['class' => 'btn btn-sm btn-success'])}}
                                <a href="/tahun_akademik" class="btn btn-sm btn-warning "><i class="fas fa-arrow-left"></i> Kembali</a>
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