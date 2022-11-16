<html>
<head>
    <title>Hasil</title>
</head>
<body>
    <div class="bg-light rounded p-4">
        <h3 style="text-align: center">Penilaian Akhir</h3>
        <table border="1" width="100%" cellspacing='0' cellpadding='8'>
            <thead>
                <tr>
                    <th scope="col">Prodi</th>
                    @foreach ($dataKriteria as $kriteria)
                        <th scope="col">{{ $kriteria->nama_kriteria }}</th>
                    @endforeach

                        <th scope="col">Keputusan</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dataProdi as $prodi)
                    <tr>
                        <td class="text-start">
                            {{ $prodi->nama_prodi}}
                            <br><small class="text-muted">{{ $prodi->kode_prodi}}</small>
                        </td>

                        @foreach ($dataKriteria as $kriteria)
                            <td style="vertical-align: middle; text-align: center">{{ isset($nilaiKriteria[$prodi->kode_prodi][$kriteria->id]) ? $nilaiKriteria[$prodi->kode_prodi][$kriteria->id] : 0  }}</td>    
                        @endforeach
                        
                        @if (isset($keputusan[$prodi->kode_prodi]))
                            <td style="vertical-align: middle; text-align: center">{!! (($keputusan[$prodi->kode_prodi] > 0)? '<span class="badge bg-success">'.$keputusan[$prodi->kode_prodi].'</span>': '<span class="badge bg-danger">0</span>') !!}</td>
                        @else
                            <td style="vertical-align: middle; text-align: center"><span class="badge bg-danger">0</span></td>    
                        @endif
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</body>