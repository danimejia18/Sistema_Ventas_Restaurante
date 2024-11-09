<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
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
        //Listar todos las mesas
        $mesas = Mesa::all();

        //Mostrar vista show.blade
        return view('Mesas/show')->with(['mesas' => $mesas]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mostrar vista create.blade.php para crear una nueva mesa
        return view('Mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Iluminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validar datos
    $data = $request->validate([
        'numero' => ['required', 'integer', 'unique:mesas,numero'], // Número de mesa requerido y único
        'capacidad' => ['required', 'integer', 'min:1'], // Capacidad requerida y debe ser un número positivo
        'estado' => 'required|in:Disponible,reservada,ocupada', // Estado requerido
     ], [
        'numero.required' => 'El número de mesa es obligatorio.',
        'numero.integer' => 'El número de mesa debe ser un número entero.',
        'numero.unique' => 'El número de mesa ya está registrado.',
        'capacidad.required' => 'La capacidad es obligatoria.',
        'capacidad.integer' => 'La capacidad debe ser un número entero.',
        'capacidad.min' => 'La capacidad debe ser al menos 1.',
        'estado.required' => 'El estado de la mesa es obligatorio.',
        'estado.in' => 'El estado debe ser: Disponible, Reservada, u Ocupada.',
    ]);

    // Crear nueva mesa
         Mesa::create([
            'numero' => $data['numero'],
            'capacidad' => $data['capacidad'],
            'estado' => $data['estado'],
        ]);
    

    // Redirigir a la vista de mesas con un mensaje de éxito
    return redirect('/Mesas/show');
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
    public function edit(Mesa $mesa)
    {
        //Mostrar vista update.blade.php
        return view('Mesas.update')->with(['mesa' => $mesa]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        // Validar datos
        $data = $request->validate([
            'numero' => ['required'], // Ignorar el registro actual
            'capacidad' => ['required', 'min:1'], // Capacidad requerida
           'estado' => 'required|in:Disponible,reservada,ocupada', // Estado requerido
        ], [
            'numero.required' => 'El número de mesa es obligatorio.',
            'numero.integer' => 'El número de mesa debe ser un número entero.',
            'capacidad.required' => 'La capacidad es obligatoria.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.min' => 'La capacidad debe ser al menos 1.',
            'estado.required' => 'El estado de la mesa es obligatorio.',
            'estado.in' => 'El estado debe ser: Disponible, Reservada, u Ocupada.',
        ]);
    
        // Actualizar los datos
        $mesa->numero = $data['numero'];
        $mesa->capacidad = $data['capacidad'];
        $mesa->estado = $data['estado'];
        $mesa->updated_at = now();
        $mesa->save();
    
        // Redireccionar
        return redirect('/Mesas/show');
    }
    

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Iluminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar la mesa
        Mesa::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }

}
