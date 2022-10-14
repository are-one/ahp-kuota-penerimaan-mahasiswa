@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kapasitas Ruangan</div>

                <div class="card-body">

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr class="text-center">
                                <th width="40">No</th>
                                <th>Ruangan</th>
                                <th>Kapasitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection