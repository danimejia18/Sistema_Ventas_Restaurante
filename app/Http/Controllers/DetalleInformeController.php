<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleInforme;
use App\Models\Empleado;
use App\Models\Informe;
use App\Models\Mesa;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Promocion;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class DetalleInformeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Listar todos los Detalle_informes
        $detalle_informes = DetalleInforme::all();

        //Mostrar vista show.blade
        return view('Detalle_informes/show')->with(['detalle_informes' => $detalle_informes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        $informes = Informe::all();
        $pedidos = Pedido::all();
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $pagos = Pago::all();
        $reservaciones = Reservacion::all();
        $mesas = Mesa::all();
        $promociones = Promocion::all();


        //Mostrar vista create.blade.php para crear un nuevo detalle_informe
        return view('Detalle_informes.create')->with([
            'informes' => $informes,
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'empleados' => $empleados,
            'pagos' => $pagos,
            'reservaciones' => $reservaciones,
            'mesas' => $mesas,
            'promociones' => $promociones
        ]);
        //Mostrar vista create.blade.php para crear un nuevo detalle_informe
        return view('Detalle_informes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $data = request()->validate([
            'id_informe' => 'required|exists:informes,codigo', // Asegúrate de que el informe exista
            'id_pedido' => 'required|exists:pedidos,codigo', // Asegúrate de que el pedido exista
            'id_cliente' => 'required|exists:clientes,codigo', // Asegúrate de que el cliente exista
            'id_empleado' => 'required|exists:empleados,codigo', // Asegúrate de que el empleado exista
            'id_pago' => 'required|exists:pagos,codigo', // Asegúrate de que el pago exista
            'id_reservacion' => 'required|exists:reservaciones,codigo', // Asegúrate de que la reservación exista
            'id_mesa' => 'required|exists:mesas,codigo', // Asegúrate de que la mesa exista
            'id_promocion' => 'required|exists:promociones,codigo' // Asegúrate de que la promoción exista
        ]);
    
        // Crear el nuevo detalle del informe
        DetalleInforme::create($data);
    
        // Redirigir a la vista de detalles del informe
        return redirect('/Detalle_informes/show');
        //Validar datos
        $data = request()->validate([
            'id_informe' => 'required',
            'id_pedido' => 'required',
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'id_pago' => 'required',
            'id_reservacion' => 'required',
            'id_mesa' => 'required',
            'id_promocion' => 'required'
            ]);
    
            DetalleInforme::create($data);
    
            return redirect('/Detalle_informes/show');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleInforme $detalle_informe)
    {
        // Recuperar todas las listas necesarias
    $informes = Informe::all();
    $pedidos = Pedido::all();
    $clientes = Cliente::all();
    $empleados = Empleado::all();
    $pagos = Pago::all();
    $reservaciones = Reservacion::all();
    $mesas = Mesa::all();
    $promociones = Promocion::all();

    // Pasar todas las variables a la vista
    return view('Detalle_informes.update')->with([
        'detalle_informe' => $detalle_informe,
        'informes' => $informes,
        'pedidos' => $pedidos,
        'clientes' => $clientes,
        'empleados' => $empleados,
        'pagos' => $pagos,
        'reservaciones' => $reservaciones,
        'mesas' => $mesas,
        'promociones' => $promociones
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleInforme $detalle_informe)
    {
        //Validar datos
        $data = request()->validate([
            'id_informe' => 'required|exists:informes,codigo', // Asegúrate de que el informe exista
            'id_pedido' => 'required|exists:pedidos,codigo', // Asegúrate de que el pedido exista
            'id_cliente' => 'required|exists:clientes,codigo', // Asegúrate de que el cliente exista
            'id_empleado' => 'required|exists:empleados,codigo', // Asegúrate de que el empleado exista
            'id_pago' => 'required|exists:pagos,codigo', // Asegúrate de que el pago exista
            'id_reservacion' => 'required|exists:reservaciones,codigo', // Asegúrate de que la reservación exista
            'id_mesa' => 'required|exists:mesas,codigo', // Asegúrate de que la mesa exista
            'id_promocion' => 'required|exists:promociones,codigo' // Asegúrate de que la promoción exista
        ],[
            'id_informe' => 'required',
            'id_pedido' => 'required',
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'id_pago' => 'required',
            'id_reservacion' => 'required',
            'id_mesa' => 'required',
            'id_promocion' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $detalle_informe->id_informe = $data['id_informe'];
            $detalle_informe->id_pedido = $data['id_pedido'];
            $detalle_informe->id_cliente = $data['id_cliente'];
            $detalle_informe->id_empleado = $data['id_empleado'];
            $detalle_informe->id_pago = $data['id_pago'];
            $detalle_informe->id_reservacion = $data['id_reservacion'];
            $detalle_informe->id_mesa = $data['id_mesa'];
            $detalle_informe->id_promocion = $data['id_promocion'];
            $detalle_informe->updated_at = now();

            // Actualizar los datos del detalle_informe
            $detalle_informe->save();

            // Redireccionar
            return redirect('/Detalle_informes/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar el Detalle_informe
        DetalleInforme::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
