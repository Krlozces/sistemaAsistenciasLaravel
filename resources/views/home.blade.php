<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('navbar')
    @include('modalEliminarAsistencia')
    <main>
        <h1 class="text-center">ASISTENCIA DE TRABAJADORES</h1>
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
            <div class="d-flex justify-content-between">
                <article class="text-right m-2">
                    <a href="{{ route('generar-reporte-asistencia') }}" class="btn btn-success" >
                        <i class="fa-solid fa-file-pdf"></i>
                        Generar reporte
                    </a>
                </article>
                <article class="m-2">
                    <form action="" method="post">
                        @csrf
                        <label for="campo" class="form-label">
                            <input type="search" name="input" id="campo" class="form-control" placeholder="Buscar...">
                        </label>
                    </form>
                </article>
            </div>
        </section>
        <section class="table-wrapper">
            <table class="fl-table" >
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>DOCENTE</th>
                        <th>CARGO</th>
                        <th>ENTRADA</th>
                        <th>SALIDA</th>
                        <th>PERFIL</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody id="content">
                    @foreach ($elementos as $elemento)
                        <tr>
                            <td>{{ $elemento->dni }}</td>
                            <td>{{ $elemento->nombre. ' ' .$elemento->apellidos }}</td>
                            <td>{{ $elemento->descripcion }}</td>
                            <td>{{ $elemento->entrada }}</td>
                            <td>{{ $elemento->salida }}</td>
                            <td><img src="{{ asset('storage/'.$elemento->ruta_imagen) }}" alt="perfil" width="100" height="100"></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal-{{ $elemento->dni }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section class="buttons-spacing">
            <nav>
                {{ $elementos->links() }}
            </nav>
        </section>
    </main>
    <script async defer>
        // Filtro por search input
        let timeoutId;
        
        function getData() {
            clearTimeout(timeoutId);
    
            timeoutId = setTimeout(() => {
                let input = document.getElementById("campo").value;
                let content = document.getElementById("content");
                let url = "{{ route('search') }}";
                let formData = new FormData();
                formData.append('input', input);
                formData.append('_token', '{{ csrf_token() }}');
    
                fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = '';
    
                    if (Array.isArray(data)) {
                        data.forEach(elemento => {
                            const row = document.createElement('tr');
    
                            row.innerHTML = `
                                <td>${elemento.dni}</td>
                                <td>${elemento.nombre} ${elemento.apellidos}</td>
                                <td>${elemento.descripcion}</td>
                                <td>${elemento.entrada}</td>
                                <td>${elemento.salida}</td>
                            `;
    
                            content.appendChild(row);
                        });
                    } else {
                        content.innerHTML = '<tr><td colspan="5">No se encontraron resultados.</td></tr>';
                    }
                }).catch(err => {
                    console.error('Error al realizar la búsqueda:', err);
                });
            }, 500);
        }
    
        document.getElementById("campo").addEventListener('input', getData);
    </script>
    
</body>
</html>