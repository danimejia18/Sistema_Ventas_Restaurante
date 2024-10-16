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
     */
    public function index()
    {
        //Listar todos los detalle_pedidos
        $detalle_pedidos = DetallePedido::all();

        //Mostrar vista show.blade
        return view('Detalle_pedidos/show')->with(['detalle_pedidos' => $detalle_pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar vista create.blade.php para crear un nuevo detalle_pedido
        return view('Detalle_pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = request()->validate([
            'id_pedido' => 'required',
            'id_producto' => 'required',
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'subtotal' => 'required'
            ]);
    
            DetallePedido::create($data);
    
            return redirect('/Detalle_pedidos/show');
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
    public function edit(DetallePedido $detalle_pedido)
    {
        // Listar pedidos para llenar select
        $pedidos = Pedido::all();
        // Mostrar vista update.blade.php junto al detalle_pedido y los pedidos
        return view('Detalle_pedidos.update')->with(['detalle_pedido' => $detalle_pedido, 'pedidos' => $pedidos]);

        // Listar productos para llenar select
        $productos = Producto::all();
        // Mostrar vista update.blade.php junto al detalle_pedido y los productos
        return view('Detalle_pedidos.update')->with(['detalle_pedido' => $detalle_pedido, 'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetallePedido $detalle_pedido)
    {
        //Validar datos
        $data = request()->validate([
            'id_pedido' => 'required',
            'id_producto' => 'required',
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'subtotal' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $detalle_pedido->id_pedido = $data['id_pedido'];
            $detalle_pedido->id_producto = $data['id_producto'];
            $detalle_pedido->cantidad = $data['cantidad'];
            $detalle_pedido->precio_unitario = $data['precio_unitario'];
            $detalle_pedido->subtotal = $data['subtotal'];
            $detalle_pedido->updated_at = now();

            // Actualizar los datos del detalle_pedido
            $detalle_pedido->save();

            // Redireccionar
            return redirect('/Detalle_pedidos/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar el Detalle_pedido
        DetallePedido::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
