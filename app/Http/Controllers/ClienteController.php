<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        // Listar todas los clientes
        $clientes = Cliente::all();

        // Mostrar vista index.blade.php junto al listado de clientes
        return view('Clientes.show')->with(['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Mostrar vista create.blade.php para un nuevo cliente
        return view('Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *  @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar campos
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required', 
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->codigo . ',codigo',
            'telefono' => 'required|numeric|digits_between:8,15', 
            'direccion' => 'required',
        ], [
            'correo.required' => 'El campo de correo es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser válido.',
            'correo.unique' => 'Este correo ya está registrado para otro cliente.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.numeric' => 'El número de teléfono debe contener solo números.',
            'telefono.digits_between' => 'El número de teléfono debe tener entre 8 y 15 dígitos.',
        ]);

        // Crear nuevo cliente
        Cliente::create($data);

        //Redireccionar
        return redirect('/Clientes/show');
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
    public function edit(Cliente $cliente)
    {
        
        // Mostrar vista update.blade.php de cliente
        return view('Clientes.update')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
       //Validar campos
       $data = request()->validate([
        'nombre' => 'required',
        'apellido' => 'required', 
        'correo' => 'required|email|unique:clientes,correo', 
        'telefono' => 'required|numeric|digits_between:8,10', 
        'direccion' => 'required',
    ], [
        'correo.required' => 'El campo de correo es obligatorio.',
        'correo.email' => 'El correo electrónico debe ser válido.',
        'correo.unique' => 'Este correo ya está registrado para otro cliente.',
        'telefono.required' => 'El número de teléfono es obligatorio.',
        'telefono.numeric' => 'El número de teléfono debe contener solo números.',
        'telefono.digits_between' => 'El número de teléfono debe tener entre 8 y 15 dígitos.',
    ]);

        // Reemplazar datos anteriores por los nuevos
        $cliente->nombre = $data['nombre'];
        $cliente->apellido = $data['apellido'];
        $cliente->correo = $data['correo'];
        $cliente->telefono = $data['telefono']; 
        $cliente->direccion = $data['direccion'];
        $cliente->updated_at = now();

        // Actualizar los datos del cliente
        $cliente->save();

        // Redireccionar
        return redirect('/Clientes/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el cliente
        Cliente::destroy($id);

        // Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
