<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Categoria;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar todos los platos
        $platos = Plato::select(
            "platos.codigo",
            "platos.nombre",
            "platos.precio",
            "platos.ingredientes",
            "categorias.nombre as id_categoria"
        )
        ->join("categorias", "categorias.codigo", "=", "platos.id_categoria")
        ->get();

        // Mostrar vista show.blade.php junto al listado de productos
        return view('Platos.show')->with(['platos' => $platos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar categorias para llenar select
        $categorias = Categoria::all();

        //Mostrar vista create.blade.php junto al listado de categorias
        return view('Platos.create')->with(['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar campos
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'precio' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'], 
            'ingredientes' => ['required', 'string', 'regex:/^[\p{L}\s,]+$/u'],
            'id_categoria' => 'required'
        ]);

        // Enviar insert
        Plato::create($data);
        
        //Redireccionaar 
        return redirect('/Platos/show');
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
    public function edit(Plato $plato)
    {
        // Listar categorias para llenar select
        $categorias = Categoria::all();

        // Mostrar vista update.blade.php junto al listado de categorias
        return view('Platos.update')->with(['plato' => $plato, "categorias" => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Plato $plato)
    {
          //Validar campos
          $data = $request->validate([
            'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'precio' => 'required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0', 
            'ingredientes' => ['required', 'string', 'regex:/^[\p{L}\s,]+$/u'],
            'id_categoria' => 'required'
        ]);

        // Reemplazar datos anteriores por los nuevos
        $plato->nombre = $data['nombre'];
        $plato->precio = $data['precio'];
        $plato->ingredientes = $data['ingredientes'];
        $plato->id_categoria = $data['id_categoria'];
        $plato->updated_at = now();
        
        // Enviar a guardar la actualización
        $plato->save();

        //Redirecionar
        return redirect('/Platos/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar en producto con el id recibido
        Plato::destroy($id);

        //Retornar una respuesta json
        return response()->json(['res' => true]);
    }
}
