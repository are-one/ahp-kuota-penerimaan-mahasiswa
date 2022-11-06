@extends('layouts.master')
@section ('title', 'SPK | Hasil Penilaian')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <h6 class="mb-0"><i>Proses Akhir Penilaian AHP</i></h6>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    @include('alert')

    <div class="row g-4 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <h6><i>Program Studi dan Tahun Akademik</i></h6>
                <form class="row g-4" action="" method="GET">
            
                    <div class="col">
                            <select name="kode_prodi" class="form-select">
                                <option value="">Pilih Prodi ...</option>
                                @foreach ($dataProdi as $prodi)
                                    <option value="{{$prodi->kode_prodi}}" {{ ($prodi->kode_prodi == $kode_prodi)? 'selected' : '' }}>{{$prodi->nama_prodi}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col">
                        <select name="id_tahun" class="form-select">
                            <option value="">Pilih Prodi ...</option>
                            @foreach ($dataTahun as $tahun)
                                <option value="{{$tahun->id_tahun}}" {{ ($tahun->id_tahun == $id_tahun)? 'selected' : '' }}>{{$tahun->tahun_akademik}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i>
                                Cari Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <table class="table text-center" id="hasil-table">
                    <thead>
                        <tr>
                            <th scope="col">Id Prodi</th>
                            <th scope="col">Jml.Mahasiswa Aktif</th>
                            <th scope="col">Jml.Mahasiswa TA</th>
                            <th scope="col">Jml.Dosen Aktif</th>
                            <th scope="col">Jumlah Ruangan</th>
                            <th scope="col">Kapasitas Ruangan</th>
                            <th scope="col">Keputusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="row g-0">
        <div class="col-sm-12 col-xl-8">
            <div class="h-100 p-0">
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="h-100 p-0">
                <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-file-archive"></i> Proses</button>
                <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-file-archive"></i> Cetak</button>
            </div>
        </div>
    </div>
</div>

@endsection