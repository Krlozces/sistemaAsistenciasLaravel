<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    @php
        \Carbon\Carbon::setLocale('es');
        $now = \Carbon\Carbon::now();
        $dia = $now->format('l');
        $fecha = $now->format('d-m-Y');
        $hora = $now->format('H:i:s');
    @endphp
    <main>
        @if (session('reload'))
            <script>
                window.location.reload();
                var reloadTimeout = {{ session('reloadTimeout', 0) }};
                if (reloadTimeout > 0) {
                    setTimeout(function() {
                        window.location.reload();
                    }, reloadTimeout);
                }
            </script>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-center">Registro de asistencia</h1>
        <div>
            <h2 class="text-center">
                <span id="dia"></span> <span id="fecha"></span> <span id="hora"></span>
            </h2>
        </div>
        <div class="container-md border rounded d-flex flex-column jutify-content-center align-items-center w-25 p-4 mt-5">
            <h2>INGRESE SU DNI</h2>
            <img src="{{ asset('images/dni.png') }}" alt="Imagen referencial a dni" width="250px">
            <form action="{{ route('asistencia') }}" method="post" class="d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
                @csrf
                <label for="dni" class="form-label">
                    <input type="text" name="dni" id="dni" placeholder="DNI" class="form-control" maxlength="8">
                </label>

                <video id="camara" width="640" height="480" autoplay style="display: none;"></video>
                <canvas id="foto" width="640" height="480" style="display: none;"></canvas>
                {{-- <img id="imagenMostrada" style="display:none;" width="640" height="480" /> --}}
                
                <div class="d-flex justify-content-evenly w-100">
                    <button class="btn btn-outline-primary" name="marcar" value="entrada">ENTRADA</button>
                    <button class="btn btn-outline-secondary" name="marcar" value="salida">SALIDA</button>
                </div>
            </form>
            <p><a href="{{ route('login') }}">Ingresar al sistema</a></p>
        </div>
    </main>
    <footer></footer>
    <script src="{{ asset('js/funciones.js') }}" async defer></script>
</body>
</html>