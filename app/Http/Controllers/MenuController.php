<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\Plato;
use App\Models\Categoria;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     * 
     */
   public function index()
    {
        // Listar todos los menús con sus platos y categorías
        $menus = Menu::select(
            "menus.codigo",
            "menus.nombre",
            "platos.nombre as id_plato", // Suponiendo que hay un campo 'nombre' en la tabla 'platos'
            "categorias.nombre as id_categoria" // Suponiendo que hay un campo 'nombre' en la tabla 'categorias'
        )
        ->join("platos", "platos.codigo", "=", "menus.id_plato") // Cambia 'codigo' por la clave primaria de la tabla 'platos'
        ->join("categorias", "categorias.codigo", "=", "menus.id_categoria") // Cambia 'codigo' por la clave primaria de la tabla 'categorias'
        ->get();
    
        // Mostrar vista show.blade.php junto al listado de menús
        return view('Menus.show')->with(['menus' => $menus]);
    
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {// Listar platos y categorías para llenar select
        $platos = Plato::all();
        $categorias = Categoria::all();
        
        // Mostrar vista create.blade.php junto al listado de platos y categorías
        return view('Menus.create')->with(['platos' => $platos, 'categorias' => $categorias]);
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
        //Validar datos
        $data = $request->validate([
            'nombre' => 'required','string','max:50', 'regex:/^[\p{L}\s\-\']+$/u',
            'id_plato' => 'required','integer', 'exists:platos,codigo',
            'id_categoria' => 'required', 'integer', 'exists:categorias,codigo',
            ]);
    
            Menu::create($data);
    
            return redirect('/Menus/show');
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
<<<<<<< HEAD
        $platos = Plato::all(); // Obtener todos los platos
        $categorias = Categoria::all();
=======
       // Listar platos para llenar select
       $platos = Plato::all();
       // Listar categorias para llenar select
       $categorias = Categoria::all();
>>>>>>> b121f38bb6457fb9af55c5bc721630481c9c3624
        //Mostrar vista update.blade.php   
        return view('Menus.update')->with(['menu' => $menu, 'platos' => $platos, 'categorias' => $categorias]);
   
    }

    /**
     * Update the specified resource in storage.
     *  @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //Validar datos
        $data = $request->validate([
            'nombre' => 'required','string', 'max:50', 'regex:/^[\p{L}\s\-\']+$/u',
            'id_plato' => 'required','integer', 'exists:platos,codigo',
            'id_categoria' => 'required', 'integer', 'exists:categorias,codigo',
            ]);

            // Reemplazar datos anteriores por los nuevos
            $menu->nombre = $data['nombre'];
            $menu->id_plato = $data['id_plato'];
            $menu->id_categoria = $data['id_categoria'];
            $menu->updated_at = now();

            // Actualizar los datos del menú
            $menu->save();

            // Redireccionar
            return redirect('/Menus/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el menú
        Menu::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
