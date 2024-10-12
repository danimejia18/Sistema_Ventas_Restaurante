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
        //Validar datos
        $data = request()->validate([
        'numero' => 'required',
        'capacidad' => 'required',
        'estado' => 'required'
        ]);

        Mesa::create($data);

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
         //Validar datos
         $data = request()->validate([
            'numero' => 'required',
            'capacidad' => 'required',
            'estado' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $mesa->numero = $data['numero'];
            $mesa->capacidad = $data['capacidad'];
            $mesa->estado = $data['estado'];
            $mesa->updated_at = now();

            // Actualizar los datos de la mesa
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
