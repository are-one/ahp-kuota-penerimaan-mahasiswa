<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal Sistem Pakar Maba FMIPA</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }



        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else

            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <h1><b> SPK-Kuota MABA FMIPA</b></h1>
            </div>

            <div class="links">
                <a href="/prodi" class="btn btn-success btn-lg"><i class="fas fa-users"></i> Open Data Kuota</a>
                <a href="" class="btn btn-danger btn-lg"><i class="fas fa-edit"></i></i> Open Input Nilai Kuota</a>
                <a href="" class="btn btn-primary btn-lg"><i class="fas fa-book"></i> Hasil/Laporan</a><br><br>
                <a href="" class="btn btn-info btn-lg"><i class="fas fa-chalkboard-teacher"></i> Input Data Nilai Kuota</a>
                <a href="" class="btn btn-warning btn-lg"><i class="fas fa-newspaper"></i> Open Perhitungan AHP</a>
            </div>
        </div>
    </div>
</body>

</html>