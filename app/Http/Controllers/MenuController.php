<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Menu;
use App\Models\Plato;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        //Listar todos las menus
        $menus = Menu::all();

        //Mostrar vista show.blade
        return view('Menus/show')->with(['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar vista create.blade.php para crear un nuevo menú
        return view('Menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = request()->validate([
            'nombre' => 'required',
            'id_plato' => 'required',
            'id_categoria' => 'required'
            ]);
    
            Menu::create($data);
    
            return redirect('/Menus/show');
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
    public function edit(Menu $menu)
    {
       // Listar platos para llenar select
       $platos = Plato::all();
       // Mostrar vista update.blade.php junto al menu y los platos
       return view('Menus.update')->with(['menu' => $menu, 'platos' => $platos]);

       // Listar categorias para llenar select
       $categorias = Categoria::all();
       // Mostrar vista update.blade.php junto al menu y los categorias
       return view('Menus.update')->with(['menu' => $menu, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //Validar datos
        $data = request()->validate([
            'nombre' => 'required',
            'id_plato' => 'required',
            'id_categoria' => 'required'
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
     */
    public function destroy($id)
    {
        // Eliminar el menú
        Menu::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
