<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
        // Listar todas las categorías
        $categorias = Categoria::all();

        // Mostrar vista index.blade.php junto al listado de categorías
        return view('Categorias.show')->with(['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar vista create.blade.php para crear una nueva categoría
        return view('Categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar campos
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        // Crear nueva categoría
        Categoria::create($data);

        // Redireccionar
        return redirect('/Categorias/show');
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
    public function edit(Categoria $categoria)
    {
        // Mostrar vista edit.blade.php para editar la categoría
        return view('Categorias.update')->with(['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Validar campos
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
    
        // Reemplazar datos anteriores por los nuevos
        $categoria->nombre = $data['nombre'];
        $categoria->descripcion = $data['descripcion'];
        $categoria->updated_at = now();
    
        // Actualizar los datos de la categoría
        $categoria->save();
    
        // Redireccionar
        return redirect('/Categorias/show');
    }
    

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar la categoría
        Categoria::destroy($id);

        // Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
