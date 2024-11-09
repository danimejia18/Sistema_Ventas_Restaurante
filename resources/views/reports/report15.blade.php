<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de reservaciones</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            font-size: 16px;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #6c757d;
            color: #fff;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td:first-child {
            background-color: #e9ecef;
            font-weight: bold;
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1 align="center">Listado de Reservaciones</h1>
    <hr><br>
    <table>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Mesa</th>
                <th>Fecha y Hora</th>
                <th>Estado</th>
            </tr>
            {{-- Lista de Categorías --}}
            @foreach ($data as $item)
            <tr>
                <td style="background-color: bisque">{{ $item->codigo }}</td>
                <td>{{ $item->cliente_nombre }}</td> <!-- Nombre del cliente -->
                <td>{{ $item->mesa_numero }}</td>     <!-- Número de la mesa -->
                <td>{{ $item->fecha_hora }}</td>
                <td>{{ $item->estado }}</td>
            </tr>
            
            @endforeach
     
    </table>
</body>
</html>