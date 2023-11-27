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

        table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th{
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th{
            text-align: center;
        }

        tr:nth-child(even){
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('images/logoSistema.png') }}" alt="Logo colegio" class="logo">
    <h1>Reporte de personal</h1>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>CARGO</th>
                <th>TELEFONO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elementos as $elemento)
                <tr>
                    <td>{{ $elemento->dni }}</td>
                    <td>{{ $elemento->nombre }}</td>
                    <td>{{ $elemento->apellidos }}</td>
                    <td>{{ $elemento->descripcion }}</td>
                    <td>{{ $elemento->telefono }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>