<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Acceso;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
    // Listar todos los empleados
    $empleados = Empleado::select(
        "empleados.codigo",
        "empleados.nombre", 
        "empleados.apellido",
        "empleados.correo",
        "empleados.telefono",
        "empleados.rol",
        "empleados.contraseña",
        "accesos.tipo_acceso as id_acceso"
    )
    ->join("accesos", "accesos.codigo", "=", "empleados.id_acceso")
    ->get();

    return view('Empleados.show')->with(["empleados" => $empleados]);
}
/**
 * Show the form for creating a new resource.
 * 
 * @return \Illuminate\Http\Response
 */
public function create()
{
    // Listar accesos para llenar select
    $accesos = Acceso::all();
    
    // Mostrar vista create.blade.php junto al listado de accesos
    return view('Empleados.create')->with(['accesos' => $accesos]);
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
        'nombre' => 'required',
        'apellido' => 'required',
        'correo' => 'required|email',
        'telefono' => 'required',
        'rol' => 'required',
        'contraseña' => 'required|min:8',
        'id_acceso' => 'required'
    ]);


    // Cifrar la contraseña
    $data['contraseña'] = bcrypt($data['contraseña']);

    // Crear nuevo empleado
    Empleado::create($data);

    // Redirigir a la vista de empleados con un mensaje de éxito
    return redirect('/Empleados/show');
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
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        // Listar accesos para llenar select
        $accesos = Acceso::all();

        //Mostrar vista.blade.php junto al listado de acceso
        return view('Empleados.update')->with(['empleado' => $empleado, 'accesos' => $accesos]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        // Validar campos
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => ['required', 'email', 'unique:empleados,correo,' . $empleado->codigo . ',codigo'], // Cambia 'id' por 'codigo'
            'telefono' => 'required|numeric|digits_between:8,15',
            'rol' => 'required',
            'contraseña' => 'required|min:8',
            'id_acceso' => 'required',
        ], [
            'correo.required' => 'El campo de correo es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser válido.',
            'correo.unique' => 'Este correo ya está registrado para otro cliente.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.numeric' => 'El número de teléfono debe contener solo números.',
            'telefono.digits_between' => 'El número de teléfono debe tener entre 8 y 15 dígitos.',
        ]);

    // Cifrar la contraseña solo si se ha proporcionado una nueva
    if ($request->filled('contraseña')) {
        $data['contraseña'] = bcrypt($data['contraseña']);
    } else {
        // Si no se cambia la contraseña, se mantiene la actual
        unset($data['contraseña']);
    }

        // Reemplazar datos anteriores por los nuevos
        $empleado->nombre = $data['nombre'];
        $empleado->apellido = $data['apellido'];
        $empleado->correo = $data['correo'];
        $empleado->telefono = $data['telefono'];
        $empleado->rol = $data['rol'];
        $empleado->contraseña = $data['contraseña'];
        $empleado->id_acceso = $data['id_acceso'];
        $empleado->updated_at = now();
       
        //Enviar a guardar la actualización
        $empleado->save();
    
        // Redireccionar
        return redirect('/Empleados/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el empleado
        Empleado::destroy($id);
        
        // Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
