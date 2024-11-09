<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Acceso;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\DetalleInforme;
use App\Models\DetallePedido;
use App\Models\Empleado;
use App\Models\Informe;
use App\Models\Menu;
use App\Models\Mesa;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Plato;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Reservacion;

class ReportController extends Controller
{
    public function reporteUno()
    {
        //Extraer todos los accesos
        $data = Acceso::all();

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report1', compact('data'));
        return $pdf->stream('accesos.pdf');
    }

    public function reporteDos()
    {
        //Extraer todos los accesos
        $data = Categoria::all();


        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report2', compact('data'));
        return $pdf->stream('categorias.pdf');
    }

    public function reporteTres()
    {
        //Extraer todos los accesos
        $data = Cliente::all();

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report3', compact('data'));
        return $pdf->stream('clientes.pdf');
    }

    public function reporteCuatro()
    {
        //Extraer todos los detalles
        $data = DetalleInforme::select(
            "detalle_informes.codigo",
            "informes.titulo as nombre_informe",
            "pedidos.nombre as nombre_pedido",        
            "clientes.nombre as nombre_cliente",
            "empleados.nombre as nombre_empleado",
            "pagos.monto as nombre_pago",
            "reservaciones.estado as nombre_reservacion",
            "mesas.numero as nombre_mesa",
            "promociones.nombre as nombre_promocion",
        )
        ->join("informes", "informes.codigo", "=", "detalle_informes.id_informe")
        ->join("pedidos", "pedidos.codigo", "=", "detalle_informes.id_pedido")      
        ->join("clientes", "clientes.codigo", "=", "detalle_informes.id_cliente")      
        ->join("empleados", "empleados.codigo", "=", "detalle_informes.id_empleado")
        ->join("pagos", "pagos.codigo", "=", "detalle_informes.id_pago")      
        ->join("reservaciones", "reservaciones.codigo", "=", "detalle_informes.id_reservacion")
        ->join("mesas", "mesas.codigo", "=", "detalle_informes.id_mesa")
        ->join("promociones", "promociones.codigo", "=", "detalle_informes.id_promocion")
        ->get();

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report4', compact('data'))
        ->setOption('orientation', 'landscape')
        ->setOption('page-size', 'A4');
        return $pdf->stream('detalleInfo.pdf');
    }

    public function reporteCinco()
    {
        //Extraer todos los accesos
        $data = DetallePedido::select(  
            "detalle_pedidos.codigo",
            "detalle_pedidos.cantidad",
            "detalle_pedidos.precio_unitario",
            "detalle_pedidos.subtotal",
            "pedidos.nombre as nombre_pedido",
            "platos.nombre as nombre_plato"
        )
    ->join("pedidos", "pedidos.codigo", "=", "detalle_pedidos.id_pedido")
    ->join("platos", "platos.codigo", "=", "detalle_pedidos.id_plato") 
    ->get();


        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report5', compact('data'));
        return $pdf->stream('detallePedidos.pdf');
    }

    public function reporteSeis()
{
    // Extraer todos los empleados junto con su tipo de acceso
    $data = Empleado::select(
        "empleados.codigo",
        "empleados.nombre", 
        "empleados.apellido",
        "empleados.correo",
        "empleados.telefono",
        "empleados.rol",
        "empleados.password",
        "accesos.tipo_acceso as tipo_acceso" // Alias más descriptivo
    )
    ->join("accesos", "accesos.codigo", "=", "empleados.id_acceso")
    ->get();

    // Cargar vista del reporte con la data
    $pdf = Pdf::loadView('/reports/report6', compact('data'));
    return $pdf->stream('empleados.pdf');
}



    public function reporteSiete()
    {
        //Extraer todos los accesos
        $data = Informe::all()

        ->map(function ($informe) {
            // Formatear la fecha
            $informe->fecha = Carbon::parse($informe->fecha)->format('Y-m-d');
            return $informe;
        });

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report7', compact('data'));
        return $pdf->stream('Repporteinforme.pdf');
    }

    public function reporteOcho()
    {
        // Extraer todos los accesos
        $data = Menu::select(
            "menus.codigo",
            "menus.nombre",
            "platos.nombre as plato_nombre", // Alias para evitar confusión
            "categorias.nombre as categoria_nombre" // Alias para evitar confusión
        )
        ->join("platos", "platos.codigo", "=", "menus.id_plato")
        ->join("categorias", "categorias.codigo", "=", "menus.id_categoria")
        ->get();
    
        // Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report8', compact('data'));
        return $pdf->stream('menus.pdf');
    }
    

    public function reporteNueve()
    {
        //Extraer todos los accesos
        $data = Mesa::all();

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report9', compact('data'));
        return $pdf->stream('mesas.pdf');
    }

    public function reporteDiez()
    {
        //Extraer todos los accesos
        $data = Pago::select(
            "pagos.codigo", 
            "pagos.monto", 
            "pagos.metodo", 
            "pagos.fecha", 
            "pagos.estado", 
            "pedidos.nombre as nombre_pedido",

        )
        ->join('pedidos', 'pedidos.codigo', '=', 'pagos.id_pedido')
        ->get()
        
        ->map(function($pago) {
            // Formatear la fecha
            $pago->fecha = Carbon::parse($pago->fecha)->format('d-m-Y');
            return $pago;
        });


        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report10', compact('data'));
        return $pdf->stream('pagos.pdf');
    }

    public function reporteOnce()
    {
        //Extraer todos los accesos
        $data = Pedido::select(
            "pedidos.codigo",
            "pedidos.nombre",
            "pedidos.fecha",
            "pedidos.total",
            "pedidos.estado",
            "clientes.nombre as nombre_cliente",
            "empleados.nombre as nombre_empleado",
        )
        ->join("clientes", "clientes.codigo", "=", "pedidos.id_cliente")
        ->join("empleados", "empleados.codigo", "=", "pedidos.id_empleado")
        ->get()
    
        ->map(function($pedido) {
            // Formatear la fecha
            $pedido->fecha = Carbon::parse($pedido->fecha)->format('Y-m-d');
            return $pedido;
        });

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report11', compact('data'));
        return $pdf->stream('pedidos.pdf');
    }

    public function reporteDoce()
{
    // Extraer todos los datos de platos con su categoría
    $data = Plato::select(
        "platos.codigo",
        "platos.nombre",
        "platos.precio",
        "platos.ingredientes",
        "categorias.nombre as categoria_nombre"
    )
    ->join("categorias", "categorias.codigo", "=", "platos.id_categoria")
    ->get();

    // Cargar vista del reporte con la data
    $pdf = Pdf::loadView('/reports/report12', compact('data'));
    return $pdf->stream('platos.pdf');
}


    public function reporteTrece()
    {
        //Extraer todos los accesos
        $data = Producto::all();

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report13', compact('data'));
        return $pdf->stream('productos.pdf');
    }

    public function reporteCatorce()
    {
        //Extraer todos los accesos
        $data = Promocion::select(
            "promociones.codigo",
            "promociones.nombre",
            "promociones.descripcion",
            "promociones.descuento",
            "promociones.fecha_inicio",
            "promociones.fecha_fin",
            "promociones.estado",
            "platos.nombre as nombre_plato",
        )
        ->join("platos", "platos.codigo", "=", "promociones.id_plato")
        ->get();
    

        //Cargar vista del reporte con la data
        $pdf = Pdf::loadView('/reports/report14', compact('data'));
        return $pdf->stream('platos.pdf');
    }

    public function reporteQuince()
{
    // Extraer todos los accesos
    $data = Reservacion::select(
        "reservaciones.codigo", 
        "reservaciones.estado",
        "reservaciones.fecha_hora",
        "clientes.nombre as cliente_nombre",  // Alias descriptivo
        "mesas.numero as mesa_numero"         // Alias descriptivo
    )    
    ->join('clientes', 'clientes.codigo', '=', 'reservaciones.id_cliente')
    ->join('mesas', 'mesas.codigo', '=', 'reservaciones.id_mesa')
    ->get();

    // Cargar vista del reporte con la data
    $pdf = Pdf::loadView('/reports/report15', compact('data'));
    return $pdf->stream('reservaciones.pdf');
}

}