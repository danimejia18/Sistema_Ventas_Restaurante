<?php

namespace App\Http\Controllers;


use App\Models\Promocion;
use App\Models\Plato;
use Illuminate\Http\Request;

class PromocionController extends Controller
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
        // Listar todas las promociones junto con los detalles del plato asociado
        $promociones = Promocion::select(
            "promociones.codigo",
            "promociones.nombre",
            "promociones.descripcion",
            "promociones.descuento",
            "promociones.fecha_inicio",
            "promociones.fecha_fin",
            "promociones.estado",
            "platos.nombre as id_plato",
        )
        ->join("platos", "platos.codigo", "=", "promociones.id_plato")
        ->get();
    
        // Mostrar la vista promociones.show junto con el listado de promociones
        return view('Promociones.show')->with(['promociones' => $promociones]);
    }
    

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar platos para llenar el select
        $platos = Plato::all();
    
        // Mostrar la vista create.blade.php junto al listado de platos
        return view('Promociones.create')->with(['platos' => $platos]);
    }
    

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $data = request()->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'id_plato' => 'required|exists:platos,codigo', // Verifica que el plato exista
            'descuento' => 'required|min:0|max:100', // Valida que sea un número y puedes agregar un rango si aplica
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', // La fecha de fin debe ser posterior o igual a la fecha de inicio
            'estado' => 'required|string|in:confirmada,no confirmada', // Agregar validación para asegurarse de que sea uno de los valores permitidos
        ]);
    
        // Crear una nueva promoción
        Promocion::create($data);
    
        // Redirigir a la vista de promociones
        return redirect('/Promociones/show');
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
     * @param int $id
     * @return \Illuminate\Http\Response
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
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        //Validar datos
        $data = request()->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string',
            'id_plato' => 'required|exists:platos,codigo', // Verifica que el plato exista
            'descuento' => 'required|min:0|max:100', // Valida que sea un número y puedes agregar un rango si aplica
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', // La fecha de fin debe ser posterior o igual a la fecha de inicio
            'estado' => 'required|string|in:confirmada,no confirmada', // Agregar validación para asegurarse de que sea uno de los valores permitidos
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
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar la promocion
        Promocion::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
