@extends('layouts.master')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Data Ruangan</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-12">
            <div class="bg-light rounded vh-100 p-4">
                <div class="table-responsive">
                    <table class="table text-center" id="ruangan-table">
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