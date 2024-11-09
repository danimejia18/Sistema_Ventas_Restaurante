<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Plato;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        //Listar todos los detalle_pedidos
        $detalle_pedidos = DetallePedido::select(  
            "detalle_pedidos.codigo",
            "detalle_pedidos.cantidad",
            "detalle_pedidos.precio_unitario",
            "detalle_pedidos.subtotal",
            "pedidos.nombre as id_pedido",
            "platos.nombre as id_plato"
        )
    ->join("pedidos", "pedidos.codigo", "=", "detalle_pedidos.id_pedido")
    ->join("platos", "platos.codigo", "=", "detalle_pedidos.id_plato") 
    ->get();


        //Mostrar vista show.blade
        return view('Detalle_pedidos/show')->with(['detalle_pedidos' => $detalle_pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidos = Pedido::all();
        $platos = Plato::all();
        //Mostrar vista create.blade.php para crear un nuevo detalle_pedidos
        return view('Detalle_pedidos.create')->with(['pedidos' => $pedidos, 'platos' => $platos]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar datos
    $data = $request->validate([
        'id_pedido' => 'required|exists:pedidos,codigo', // Asegurarse de que el pedido existe
        'id_plato' => 'required|exists:platos,codigo', // Asegurarse de que el producto existe
        'cantidad' => 'required|integer|min:1', // La cantidad debe ser un número entero positivo
        'precio_unitario' => 'required|numeric|min:1', // Validar el precio
    ]);

    // Calcular el subtotal
    $data['subtotal'] = $data['cantidad'] * $data['precio_unitario'];

    // Crear el detalle del pedido
    DetallePedido::create($data);

    // Redirigir con un mensaje de éxito
    return redirect('/Detalle_pedidos/show');
}
    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePedido $detalle_pedido)
    {
        // Listar pedidos y platos para llenar los selects
        $pedidos = Pedido::all();
        $platos = Plato::all();
        
        // Pasar los datos a la vista update.blade.php junto al pedido
        return view('Detalle_pedidos.update')->with(['detalle_pedido' => $detalle_pedido, 'pedidos' => $pedidos, 'platos' => $platos]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detalle_pedido)
    {
        // Validar datos
        $data = $request->validate([
            'id_pedido' => 'required|exists:pedidos,codigo',
            'id_plato' => 'required|exists:platos,codigo',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:1',
        ]);
    
        // Calcular el subtotal y actualizar los campos
        $detalle_pedido->id_pedido = $data['id_pedido'];
        $detalle_pedido->id_plato = $data['id_plato'];
        $detalle_pedido->cantidad = $data['cantidad'];
        $detalle_pedido->precio_unitario = $data['precio_unitario'];
        $detalle_pedido->subtotal = $data['cantidad'] * $data['precio_unitario'];
    
        $detalle_pedido->save();
    
        return redirect('/Detalle_pedidos/show');
        
    }

    /**
     * Remove the specified resource from storage.
     *      
     *  @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el detalle_pedidos
        DetallePedido::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
