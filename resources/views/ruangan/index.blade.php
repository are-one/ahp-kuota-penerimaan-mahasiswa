@extends('layouts.master')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><i>Data Ruangan</i></h6>
                <div class="table-responsive">
                    <table class="table text-center" id="prodi-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection