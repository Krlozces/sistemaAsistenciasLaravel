<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ secure_asset('css/signinStyles.css') }}">
</head>
<body>
    @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
    @endif
    <div class="d-flex">
        {{-- <div class="container container-left"></div> --}}
        <div class="container-sm border rounded w-25 my-5 p-4 d-flex flex-column justify-content-center container-right">
            <img src="{{ asset('images/logoSistema.png') }}" alt="Logo colegio" class="logo">
            <h1 class="text-center">Iniciar Sesión</h1>
            <form action="{{ route('inicia-sesion') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="form-label">Recuerdame</label>
                </div>
                <div class="mb-3">
                    <a href="{{ route('signup') }}">Registrarse</a>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn rounded border btn-outline-primary">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
