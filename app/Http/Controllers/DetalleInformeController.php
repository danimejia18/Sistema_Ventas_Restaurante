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
        //Mostrar vista create.blade.php para crear un nuevo detalle_informe
        return view('Detalle_informes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        // Listar informes para llenar select
        $informes = Informe::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los informes
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'informes' => $informes]);

        // Listar pedidos para llenar select
        $pedidos = Pedido::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los pedidos
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'pedidos' => $pedidos]);

        // Listar clientes para llenar select
        $clientes = Cliente::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los clientes
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'clientes' => $clientes]);

        // Listar empleados para llenar select
        $empleados = Empleado::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los empleados
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'empleados' => $empleados]);

        // Listar pagos para llenar select
        $pagos = Pago::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los pagos
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'pagos' => $pagos]);

        // Listar reservaciones para llenar select
        $reservaciones = Reservacion::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los reservaciones
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'reservaciones' => $reservaciones]);

        // Listar mesas para llenar select
        $mesas = Mesa::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los mesas
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'mesas' => $mesas]);

        // Listar promociones para llenar select
        $promociones = Promocion::all();
        // Mostrar vista update.blade.php junto al detalle_informe y los promociones
        return view('Detalle_informes.update')->with(['detalle_informe' => $detalle_informe, 'promociones' => $promociones]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleInforme $detalle_informe)
    {
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
