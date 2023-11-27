<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Información</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesForm.css') }}">
</head>
<body>
    @include('navbar')
    <main>
        <h1 class="text-center">DATOS DE LA EMPRESA</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @foreach ($datos as $dato)
            <form action="{{ route('editar-info', ['id_empresa'=>$dato->id_empresa]) }}" method="post">
                @csrf
                <div class="container-sm d-flex justify-content-center">
                    <div>
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="nombre" id="nombre" value="{{ $dato->nombre }}">
                                <div class="underline"></div>
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="tel" name="telefono" id="telefono" value="{{ $dato->telefono }}">
                                <div class="underline"></div>
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="ruc" id="ruc" value="{{ $dato->id_empresa }}">
                                <div class="underline"></div>
                                <label for="ruc">RUC</label>
                            </div>
                        </div>
                        <div class="wrapper">
                            <div class="input-data">
                                <input type="text" name="ubicacion" id="ubicacion" value="{{ $dato->ubicacion }}">
                                <div class="underline"></div>
                                <label for="ubicacion">Ubicación</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-sm d-flex justify-content-center my-2">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk fa-shake"></i> Modificar</button>
                </div>
            </form>
        @endforeach
        <script src="{{ asset('js/funciones.js') }}" async defer></script>
    </main>
</body>
</html>