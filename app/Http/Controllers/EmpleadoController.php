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
            "empleados.password",
            "accesos.tipo_acceso as id_acceso"
        )
        ->join("accesos", "accesos.codigo", "=", "empleados.id_acceso")
        ->get();

        return view('Empleados.show')->with(['empleados' => $empleados]);
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
        $data = request()->validate([
            'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'apellido' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'correo' => ['required', 'email', 'max:150', 'unique:empleados,correo'],
            'telefono' => ['required', 'numeric', 'digits:8'],
            'rol' => ['required', 'string'], // Validación para rol
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Usa 'password' en la validación
            'id_acceso' => ['required', 'exists:accesos,codigo'], // Asegurarse de que el id_acceso existe en la tabla accesos
        ], [
            'correo.required' => 'El campo de correo es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser válido.',
            'correo.unique' => 'Este correo ya está registrado para otro empleado.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.numeric' => 'El número de teléfono debe contener solo números.',
            'telefono.digits_between' => 'El número de teléfono debe tener entre 8 y 15 dígitos.',
            'password.required' => 'La password es obligatoria.',
            'password.min' => 'La password debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las passwords no coinciden.',    
            'id_acceso.exists' => 'El acceso seleccionado no es válido.',
        ]);
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

        // Mostrar vista edit.blade.php junto al listado de accesos
        return view('Empleados.update')->with(['empleado' => $empleado, 'accesos' => $accesos]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $codigo)
     {
         // Encuentra al empleado por su código
         $empleado = Empleado::findOrFail($codigo);
     
         // Validar los datos del formulario
         $data = request()->validate([
             'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
             'apellido' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
             'correo' => ['required', 'email', 'max:150'],
             'telefono' => ['required', 'numeric', 'digits:8'],
             'rol' => ['required', 'string'],
             'password' => ['nullable', 'string', 'min:8', 'confirmed'], // Cambia 'required' a 'nullable'
             'id_acceso' => ['required', 'exists:accesos,codigo'],
         ], [
             'correo.required' => 'El campo de correo es obligatorio.',
             'correo.email' => 'El correo electrónico debe ser válido.',
             'correo.unique' => 'Este correo ya está registrado para otro empleado.',
             'telefono.required' => 'El número de teléfono es obligatorio.',
             'telefono.numeric' => 'El número de teléfono debe contener solo números.',
             'telefono.digits' => 'El número de teléfono debe tener 8 dígitos.',
             'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
             'password.confirmed' => 'Las contraseñas no coinciden.',
             'id_acceso.exists' => 'El acceso seleccionado no es válido.',
         ]);
     
         // Actualizar los campos del empleado
         $empleado->nombre = $data['nombre'];
         $empleado->apellido = $data['apellido'];
         $empleado->correo = $data['correo'];
         $empleado->telefono = $data['telefono'];
         $empleado->rol = $data['rol'];
         $empleado->id_acceso = $data['id_acceso'];
         $empleado->password = $data['password'];
     
         // Guardar los cambios en la base de datos
         $empleado->save();
     
         // Redirigir a la vista de empleados con un mensaje de éxito
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
