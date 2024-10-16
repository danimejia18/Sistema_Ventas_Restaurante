<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
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
        //Listar todos las promociones
        $promociones = Promocion::all();

        //Mostrar vista show.blade
        return view('Promociones/show')->with(['promociones' => $promociones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar vista create.blade.php para crear una nueva promocion
        return view('Promociones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_plato' => 'required',
            'descuento' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'estado' => 'required'
            ]);
    
            Promocion::create($data);
    
            return redirect('/Promociones/show');
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
    public function edit(Promocion $promocion)
    {
        // Listar platos para llenar select
        $platos = Plato::all();
        // Mostrar vista update.blade.php junto a la promocion y los platos
        return view('Promociones.update')->with(['promocion' => $promocion, 'platos' => $platos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promocion $promocion)
    {
        //Validar datos
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_plato' => 'required',
            'descuento' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'estado' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $promocion->nombre = $data['nombre'];
            $promocion->descripcion = $data['descripcion'];
            $promocion->id_plato = $data['id_plato'];
            $promocion->descuento = $data['descuento'];
            $promocion->fecha_inicio = $data['fecha_inicio'];
            $promocion->fecha_fin = $data['fecha_fin'];
            $promocion->estado = $data['estado'];
            $promocion->updated_at = now();

            // Actualizar los datos de la promocion
            $promocion->save();

            // Redireccionar
            return redirect('/Promociones/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la promocion
        Promocion::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
