<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //Listar todos los productos
        $productos = Producto::all();

        return view('Productos.show')->with(['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mostrar vista para crear un nuevo producto
        return view('Productos.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * 
     */

     public function store(Request $request)
     {
         // Validar campos
         $data = $request->validate([
             'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
             'descripcion' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
             'stock' => ['required', 'integer', 'min:0'],
             'estado' => ['required', 'in:en existencia,agotada'], // Cambiar a 'in' para validar los valores
         ]);
     
         // Crear nuevo producto
         Producto::create([
             'nombre' => $data['nombre'],
             'descripcion' => $data['descripcion'],
             'stock' => $data['stock'],
             'estado' => $data['estado'],
         ]);
     
         // Redireccionar a la lista de productos
         return redirect('/Productos/show');
     }
     

    /**
     * Display the specified resource.
     * 
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
    public function edit(Producto $producto)
    {
        //Obtener el producto a editar
        return view('Productos.update')->with(['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, Producto $producto)
     {
         // Validar campos
         $data = $request->validate([
             'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
             'descripcion' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
             'stock' => ['required', 'integer', 'min:0'],
             'estado' => ['required', 'in:en existencia,agotada'], // Verifica los valores permitidos
         ]);
     
         // Reemplazar datos anteriores por los nuevos
         $producto->nombre = $data['nombre'];
         $producto->descripcion = $data['descripcion'];
         $producto->stock = $data['stock'];
         $producto->estado = $data['estado']; // Asegúrate de que esto esté correcto
         $producto->updated_at = now(); // Esto es opcional
     
         // Guardar la actualización
         $producto->save();
     
         // Redireccionar a la lista de productos
         return redirect('/Productos/show');
     }
    
    
    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el producto con el id recibido
        Producto::destroy($id);

        //Retornar una respuesta json
        return response()->json(['res' => true]);
    }
}
