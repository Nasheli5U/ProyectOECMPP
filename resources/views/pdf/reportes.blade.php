<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Expedientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Expedientes</h1>
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Persona</th>
                <th>Dirección</th>
                <th>Procedencia</th>
                <th>Fecha Entrada</th>
                <th>Infracción</th>
                <th>Estado</th>
                <th>Comprobantes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expedientes as $expediente)
                <tr>
                    <td>{{ $expediente->numero }}</td>
                    <td>{{ $expediente->persona->nombre }} {{ $expediente->persona->apellido }}</td>
                    <td>{{ $expediente->direccion_predio }}</td>
                    <td>{{ $expediente->procedencia->nombre }}</td>
                    <td>{{ $expediente->fecha_entrada }}</td>
                    <td>{{ $expediente->infraccion->codigo }}</td>
                    <td>{{ $expediente->estado }}</td>
                    <td>{{ $expediente->comprobantes->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
