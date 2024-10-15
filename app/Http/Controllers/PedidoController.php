<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
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
         //Listar todos las mesas
         $pedidos = Pedido::all();

         //Mostrar vista show.blade
         return view('Pedidos/show')->with(['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar vista create.blade.php para crear una nueva mesa
        return view('Pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = request()->validate([
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'fecha' => 'required',
            'total' => 'required',
            'estado' => 'required'
            ]);
    
            Pedido::create($data);
    
            return redirect('/Pedidos/show');
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
    public function edit(Pedido $pedido)
    {
        // Listar clientes para llenar select
        $clientes = Cliente::all();
        // Mostrar vista update.blade.php junto al pedido y los clientes
        return view('Pedidos.update')->with(['pedido' => $pedido, 'clientes' => $clientes]);

        // Listar empleados para llenar select
        $empleados = Empleado::all();
        // Mostrar vista update.blade.php junto al pedido y los empleados
        return view('Pedidos.update')->with(['pedido' => $pedido, 'empleados' => $empleados]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //Validar datos
        $data = request()->validate([
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'fecha' => 'required',
            'total' => 'required',
            'estado' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $pedido->id_cliente = $data['id_cliente'];
            $pedido->id_empleado = $data['id_empleado'];
            $pedido->fecha = $data['fecha'];
            $pedido->total = $data['total'];
            $pedido->estado = $data['estado'];
            $pedido->updated_at = now();

            // Actualizar los datos del pedido
            $pedido->save();

            // Redireccionar
            return redirect('/Pedidos/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la mesa
        Pedido::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
