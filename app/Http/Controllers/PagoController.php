<?php

namespace App\Http\Controllers;
use Carbon\Carbon;


use App\Models\Pago;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PagoController extends Controller
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
        //Listar todos los pagos
        $pagos = Pago::select(
            "pagos.codigo", 
            "pagos.monto", 
            "pagos.metodo", 
            "pagos.fecha", 
            "pagos.estado", 
            "pedidos.nombre as id_pedido",

        )
        ->join('pedidos', 'pedidos.codigo', '=', 'pagos.id_pedido')
        ->get()
        
        ->map(function($pago) {
            // Formatear la fecha
            $pago->fecha = Carbon::parse($pago->fecha)->format('d-m-Y');
            return $pago;
        });

        //Mostrar vista show.blade
        return view('/Pagos/show')->with(['pagos' => $pagos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pedidos = Pedido::all();

         //Mostrar vista create.blade.php para crear un nuevo pago
         return view('Pagos.create')->with(['pedidos' => $pedidos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = $request->validate([
        'id_pedido' => 'required|exists:pedidos,codigo', // Verifica que el pedido exista
        'monto' => 'required|numeric|min:0', // Asegúrate de que el monto sea un número positivo
        'metodo' => 'required|in:efectivo,tarjeta,transferencia', // Asegúrate de que el método sea uno de los permitidos
        'fecha' => 'required|date', // Asegúrate de que sea una fecha válida
        'estado' => 'required|in:pagado,pendiente' // Asegúrate de que el estado sea uno de los permitidos
        ]);

        Pago::create($data);

        return redirect('/Pagos/show');
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
    public function edit(Pago $pago)
    {
        $pedidos = Pedido::all();

        //Mostrar vista update.blade.php
        return view('Pagos.update')->with(['pago' => $pago, 'pedidos' => $pedidos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //Validar datos
        $data = $request->validate([
           'id_pedido' => 'required|exists:pedidos,codigo', // Verifica que el pedido exista
            'monto' => 'required|numeric|min:1', // Asegúrate de que el monto sea un número positivo
            'metodo' => 'required|in:efectivo,tarjeta,transferencia', // Asegúrate de que el método sea uno de los permitidos
            'fecha' => 'required|date', // Asegúrate de que sea una fecha válida
            'estado' => 'required|in:pagado,pendiente' // Asegúrate de que el estado sea uno de los permitidos
            ]);

            // Reemplazar datos anteriores por los nuevos
            $pago->id_pedido = $data['id_pedido'];
            $pago->monto = $data['monto'];
            $pago->metodo = $data['metodo'];
            $pago->fecha = $data['fecha'];
            $pago->estado = $data['estado'];
            $pago->updated_at = now();

            // Actualizar los datos del pago
            $pago->save();

            // Redireccionar
            return redirect('/Pagos/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la pago
        Pago::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
