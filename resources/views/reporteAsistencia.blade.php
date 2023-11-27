<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Personal</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .logo{
            width: 120px;
            align-self: left;
        }

        h1{
            text-align: center;
            margin: 10px 0;
        }

        .table-wrapper {
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }
        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }
        .fl-table td, .fl-table th {
            text-align: center;
            padding: 8px;
        }
        .fl-table thead th {
            color: #ffffff;
            background-color: #4FC3A1;
        }
        .fl-table thead th:nth-child(odd) {
            color: #fff;
            background: #324960;
        }
        .fl-table tr:nth-child(even) {
            background: #f8f8f8;
        }
    </style>
</head>
<body>
    <div>
        <img src="{{ public_path('images/logoSistema.png') }}" alt="Logo colegio" class="logo">
    </div>
    <h1>ASISTENCIA DE TRABAJADORES</h1>
    <section class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>DOCENTE</th>
                    <th>CARGO</th>
                    <th>ENTRADA</th>
                    <th>SALIDA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($elementos as $elemento)
                    <tr>
                        <td>{{ $elemento->dni }}</td>
                        <td>{{ $elemento->nombre. ' ' .$elemento->apellidos }}</td>
                        <td>{{ $elemento->descripcion }}</td>
                        <td>{{ $elemento->entrada }}</td>
                        <td>{{ $elemento->salida }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>