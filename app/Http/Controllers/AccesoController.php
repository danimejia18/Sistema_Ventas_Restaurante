<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use Illuminate\Http\Request;

class AccesoController extends Controller
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
        // Listar todos los accesos
        $accesos = Acceso::all();

        // Mostrar vista show.blade.php junto al listado de accesos
        return view('Acceso.show')->with(['accesos' => $accesos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar vista create.blade.php para crear un nuevo acceso
        return view('Acceso.create');
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
        $data = $request->validate([
            'tipo_acceso' => 'required|string|regex:/^[\p{L}\s\-]+$/u',
            'descripcion' => 'required|string|regex:/^[\p{L}\s\-]+$/u',
        ], [
            'tipo_acceso.required' => 'El campo tipo_acceso es obligatorio.',
            'tipo_acceso.regex' => 'El tipo_acceso solo puede contener letras, espacios y guiones.',
            
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.regex' => 'El descripcion solo puede contener letras, espacios y guiones.',
           ]);

        // Crear nuevo acceso
        Acceso::create($data);

        // Redireccionar
        return redirect('/Acceso/show');
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
    public function edit(Acceso $acceso)
    {
        // Mostrar vista update.blade.php junto al acceso
        return view('Acceso.update')->with(['acceso' => $acceso]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acceso $acceso)
    {
        // Validar campos
        $data = $request->validate([
            'tipo_acceso' => 'required|string|regex:/^[\p{L}\s\-]+$/u',
            'descripcion' => 'required|string|regex:/^[\p{L}\s\-]+$/u',
        ], [
            'tipo_acceso.required' => 'El campo tipo_acceso es obligatorio.',
            'tipo_acceso.regex' => 'El tipo_acceso solo puede contener letras, espacios y guiones.',
            
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.regex' => 'El descripcion solo puede contener letras, espacios y guiones.',
           ]);

        // Reemplazar datos anteriores por los nuevos
        $acceso->tipo_acceso = $data['tipo_acceso'];
        $acceso->descripcion = $data['descripcion'];
        $acceso->updated_at = now();

        // Actualizar los datos del acceso
        $acceso->save();

        // Redireccionar
        return redirect('/Acceso/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el acceso
        Acceso::destroy($id);

        // Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
