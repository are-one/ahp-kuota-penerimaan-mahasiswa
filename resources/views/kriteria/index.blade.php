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
                        @include('validation_error')
                        {{Form::open(['url' => 'kriteria','method'=>'POST'])}}
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Kriteria</th>
                                <td>{{Form::number('id', null,['class'=>'form-control'])}}</td>
                            </tr>
                            <tr>
                                <th>Nama Kriteria</th>
                                <td>{{Form::text('nama_kriteria', null,['class'=>'form-control'])}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i> Tambah Kriteria</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-7">
                        @include('alert')
                        <div class="table-responsive">
                            <table class="table table-bordered" id="kriteria">
                                <thead>
                                    <th>ID Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th width="55">Aksi</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        $('#kriteria').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/kriteria/json',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'nama_kriteria',
                    name: 'nama_kriteria'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
@endpush