<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
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
        "productos.nombre as id_producto"
    )
    ->join("pedidos", "pedidos.codigo", "=", "detalle_pedidos.id_pedido")
    ->join("productos", "productos.codigo", "=", "detalle_pedidos.id_producto") // <- asegúrate que este campo existe
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
        $productos = Producto::all();
        //Mostrar vista create.blade.php para crear un nuevo detalle_pedidos
        return view('Detalle_pedidos.create')->with(['pedidos' => $pedidos, 'productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar datos
    $data = request()->validate([
        'id_pedido' => 'required|exists:pedidos,codigo', // Asegurarse de que el pedido existe
        'id_producto' => 'required|exists:productos,codigo', // Asegurarse de que el producto existe
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
    public function edit(DetallePedido $detalle_pedidos)
    {
        // Listar pedidos y productos para llenar los selects
        $pedidos = Pedido::all();
        $productos = Producto::all();
        
        // Pasar los datos a la vista update.blade.php junto al pedido
        return view('Detalle_pedidos.update')->with([
            'detalle_pedidos' => $detalle_pedidos,
            'pedidos' => $pedidos, // Cambié 'pedido' a 'pedidos' para que coincida
            'productos' => $productos
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detalle_pedidos)
    {
        $data = request()->validate([
            'id_pedido' => 'required',
            'id_producto' => 'required',
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'subtotal' => 'required|numeric'
        ]);
    
        $detalle_pedidos->id_pedido = $data['id_pedido'];
        $detalle_pedidos->id_producto = $data['id_producto'];
        $detalle_pedidos->cantidad = $data['cantidad'];
        $detalle_pedidos->precio_unitario = $data['precio_unitario'];
        $detalle_pedidos->subtotal = $data['subtotal']; // Asegúrate de calcularlo si no se envía del formulario
    
        $detalle_pedidos->save();
    
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
