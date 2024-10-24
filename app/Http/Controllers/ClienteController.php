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
        $data = request()->validate([
            'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'apellido' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'correo' => ['required', 'email', 'max:150', 'unique:clientes,correo'],
            'telefono' => ['required', 'numeric', 'digits:8'],
            'direccion' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-]+$/u'],
        ], [
            'nombre.regex' => 'El nombre solo puede contener letras, espacios y guiones.',
            'apellido.regex' => 'El apellido solo puede contener letras, espacios y guiones.',
            'telefono.size' => 'El número de teléfono debe tener exactamente 8 dígitos.',
            // ... otros mensajes personalizados
        ]);
    
        Cliente::create($data);
        return redirect('/Clientes/show')->with('success', 'Cliente creado exitosamente.');
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
        $data = request()->validate([
            'nombre' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'apellido' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-\']+$/u'],
            'correo' => ['required', 'email', 'max:150'],
            'telefono' => ['required', 'numeric', 'digits:8'],
            'direccion' => ['required', 'string', 'max:100', 'regex:/^[\p{L}\s\-]+$/u'],
        ], [
            'nombre.regex' => 'El nombre solo puede contener letras, espacios y guiones.',
            'apellido.regex' => 'El apellido solo puede contener letras, espacios y guiones.',
            'telefono.size' => 'El número de teléfono debe tener exactamente 8 dígitos.',
            // ... otros mensajes personalizados
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
        return redirect('/Clientes/show')->with('success', 'Cliente creado exitosamente.');
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
