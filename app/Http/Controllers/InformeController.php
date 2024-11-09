<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los informes
        $informes = Informe::all()
            ->map(function ($informe) {
                // Formatear la fecha
                $informe->fecha_creacion = Carbon::parse($informe->fecha_creacion)->format('Y-m-d');
                return $informe;
            });


        return view('Informes.show')->with(['informes' => $informes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar vista para crear un nuevo informe
        return view('Informes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:150', 'regex:/^[\p{L}\s\-\']+$/u'],
            'descripcion' => ['nullable', 'string', 'regex:/^[\p{L}\s\-\']+$/u'],
            'fecha_creacion' => ['required', 'date'],
            'estado' => ['required', 'in:pendiente,aprobado,rechazado']
        ], [
            'titulo.required' => 'El título del informe es obligatorio.',
            'fecha_creacion.required' => 'La fecha del informe es obligatoria.',
            'estado.required' => 'El estado del informe es obligatorio.'
        ]);


        // Crear nuevo informe
        Informe::create($data);

        // Redirigir a la vista de informes con un mensaje de éxito
        return redirect('/Informes/show');
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
    public function edit(Informe $informe)
    {
        $informe->fecha_creacion = Carbon::parse($informe->fecha_creacion)->format('Y-m-d');

        // Mostrar vista para editar el informe
        return view('Informes.update')->with(['informe' => $informe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        // Validar los datos del formulario
        $data = $request->validate([
            'titulo' => ['required', 'string', 'max:150', 'regex:/^[\p{L}\s\-\']+$/u'],
            'descripcion' => ['nullable', 'string', 'regex:/^[\p{L}\s\-\']+$/u'],
            'fecha_creacion' => ['required', 'date'],
            'estado' => ['required', 'in:pendiente,aprobado,rechazado']
        ], [
            'titulo.required' => 'El título del informe es obligatorio.',
            'fecha_creacion.required' => 'La fecha del informe es obligatoria.',
            'estado.required' => 'El estado del informe es obligatorio.'
        ]);

        $informe->titulo = $data['titulo'];
        $informe->descripcion = $data['descripcion'];
        $informe->fecha_creacion = $data['fecha_creacion'];
        $informe->estado = $data['estado'];
        $informe->updated_at = now();

        $data['fecha_creacion'] = Carbon::parse($data['fecha_creacion'])->format('Y-m-d');

        // Actualizar el informe
        $informe->save();

        // Redirigir a la vista de informes con un mensaje de éxito
        return redirect('/Informes/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el informe
        Informe::destroy($id);

        // Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
