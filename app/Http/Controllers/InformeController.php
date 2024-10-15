<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
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
        //Listar todos los informes
        $informes = Informe::all();

        //Mostrar vista show.blade
        return view('Informes/show')->with(['informes' => $informes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar vista create.blade.php para crear un nuevo informe
        return view('Informes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = request()->validate([
        'fecha_hora' => 'required',
        'usuario_activo' => 'required',
        'empresa' => 'required',
        'rangos_fecha' => 'required'
        ]);

        Informe::create($data);

        return redirect('/Informes/show');
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
    public function edit(Informe $informe)
    {
         //Mostrar vista update.blade.php
         return view('Informes.update')->with(['mesa' => $informe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informe $informe)
    {
        //Validar datos
        $data = request()->validate([
            'fecha_hora' => 'required',
            'usuario_activo' => 'required',
            'empresa' => 'required',
            'rangos_fecha' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $informe->fecha_hora = $data['fecha_hora'];
            $informe->usuario_activo = $data['usuario_activo'];
            $informe->empresa = $data['empresa'];
            $informe->rangos_fecha = $data['rangos_fecha'];
            $informe->updated_at = now();

            // Actualizar los datos del informe
            $informe->save();

            // Redireccionar
            return redirect('/Informes/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar el informe
        Informe::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
