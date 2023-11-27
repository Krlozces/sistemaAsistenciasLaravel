<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('navbar')
    @include('modalEditarCargo')
    @include('modalRegistrarCargo')
    @include('modalEliminarCargo')
    <main>
        <h1 class="text-center">LISTA DE CARGOS</h1>
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
        <section class="buttons-spacing">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registrar-cargos">
                <i class="fa-solid fa-user-plus fa-fade"></i> Registrar
            </button>
        </section>
        <section class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargos as $cargo)
                        <tr>
                            <td>{{ $cargo->id_cargo }}</td>
                            <td>{{ $cargo->descripcion }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editar-cargo-{{ $cargo->id_cargo }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar-cargo-{{ $cargo->id_cargo }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>