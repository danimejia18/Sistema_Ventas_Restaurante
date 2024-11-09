<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de plato</title>
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
    <h1 align="center">Listado de Platos</h1>
    <hr><br>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre del Plato</th>
                <th>Precio</th>
                <th>Ingredientes</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->precio }}</td>
                    <td>{{ $item->ingredientes }}</td>
                    <td>{{ $item->categoria_nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>