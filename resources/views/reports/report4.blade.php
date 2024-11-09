<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Detalle de informes</title>
    <style>
           @page {
            size: landscape; /* Establece la página en horizontal */
            margin: 20mm; /* Ajusta los márgenes si es necesario */
        }
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
    <h1 align="center">Detalles de Informes</h1>
    <hr><br>
    <table>
            <tr>
                <th>ID</th>
                <th>Informe</th>
                <th>Pedido</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Pago</th>
                <th>Reservación</th>
                <th>Mesa</th>
                <th>Promoción</th>
            </tr>
            {{-- Lista de Categorías --}}
            @foreach ($data as $item)
            <tr>
                <td style="background-color: bisque">{{$item['codigo']}}</td>
                <td>{{$item['nombre_informe']}}</td>
                <td>{{$item['nombre_pedido']}}</td>
                <td>{{$item['nombre_cliente']}}</td>
                <td>{{$item['nombre_empleado']}}</td>
                <td>{{$item['nombre_pago']}}</td>
                <td>{{$item['nombre_reservacion']}}</td>
                <td>{{$item['nombre_mesa']}}</td>
                <td>{{$item['nombre_promocion']}}</td>
            </tr>
            @endforeach
     
    </table>
</body>
</html>