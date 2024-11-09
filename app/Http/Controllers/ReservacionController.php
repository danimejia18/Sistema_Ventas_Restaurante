<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
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
        //Listar todas las reservaciones
        $reservaciones = Reservacion::select(
            "reservaciones.codigo", 
            "reservaciones.estado",
            "reservaciones.fecha_hora",
            "clientes.nombre as id_cliente",
            "mesas.numero as id_mesa",

        )    
        ->join('clientes', 'clientes.codigo', '=', 'reservaciones.id_cliente')
        ->join('mesas', 'mesas.codigo', '=', 'reservaciones.id_mesa')
        ->get()
        
        ->map(function($reservacion) {
            // Formatear la fecha
            $reservacion->fecha_hora = Carbon::parse($reservacion->fecha_hora)->format('d-m-Y H:i');
            return $reservacion;
        });

        //Mostrar vista show.blade
        return view('/Reservaciones/show')->with(['reservaciones' => $reservaciones]);
    }

    /**
     * Show the form for creating a new resource.              
     */
    public function create()
    {
        // Obtener clientes y empleados de la base de datos
        $clientes = Cliente::all();
        $mesas = Mesa::all();
    
        //Mostrar vista create.blade.php para crear una nueva Reservacion
        return view('Reservaciones.create')->with(['clientes' => $clientes, 'mesas' => $mesas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = $request->validate([
        'id_cliente' => 'required|exists:clientes,codigo', // Verifica que el cliente exista
        'id_mesa' => 'required|exists:mesas,codigo', // Verifica que la mesa exista
        'fecha_hora' => 'required|date', // Asegúrate de que sea una fecha válida
        'estado' => 'required|in:reservado,cancelado,vencido' // Asegúrate de que el estado sea uno de los permitidos
        ]);

        Reservacion::create($data);
    
        return redirect('/Reservaciones/show');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservacion $reservacion)
    {
        //  llenar select
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        // Mostrar vista update.blade.php junto a la reservacion y los clientes
        return view('Reservaciones.update')->with(['reservacion' => $reservacion, 'clientes' => $clientes, 'mesas' => $mesas]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservacion $reservacion)
    {
        //Validar datos
        $data = $request->validate([
            'id_cliente' => 'required|exists:clientes,codigo', // Verifica que el cliente exista
            'id_mesa' => 'required|exists:mesas,codigo', // Verifica que la mesa exista
            'fecha_hora' => 'required|date', // Asegúrate de que sea una fecha válida
            'estado' => 'required|in:reservado,cancelado,vencido' // Asegúrate de que el estado sea uno de los permitidos
        ]);

            // Reemplazar datos anteriores por los nuevos
            $reservacion->id_cliente = $data['id_cliente'];
            $reservacion->id_mesa = $data['id_mesa'];
            $reservacion->fecha_hora = $data['fecha_hora'];
            $reservacion->estado = $data['estado'];
            $reservacion->updated_at = now();

            // Actualizar los datos de la Reservacion
            $reservacion->save();

            // Redireccionar
            return redirect('/Reservaciones/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la Reservacion
        Reservacion::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
