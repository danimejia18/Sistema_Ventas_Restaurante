<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
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
        //Listar todos los pagos
        $pagos = Pago::all();

        //Mostrar vista show.blade
        return view('Pagos/show')->with(['pagos' => $pagos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         //Mostrar vista create.blade.php para crear un nuevo pago
         return view('Pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos
        $data = request()->validate([
            'id_pedido' => 'required',
            'monto' => 'required',
            'metodo' => 'required',
            'fecha' => 'required',
            'estado' => 'required'
            ]);
    
            Pago::create($data);
    
            return redirect('/Pagos/show');
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
    public function edit(Pago $pago)
    {
        //Mostrar vista update.blade.php
        return view('Pagos.update')->with(['pago' => $pago]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //Validar datos
        $data = request()->validate([
            'id_pedido' => 'required',
            'monto' => 'required',
            'metodo' => 'required',
            'fecha' => 'required',
            'estado' => 'required'
            ]);

            // Reemplazar datos anteriores por los nuevos
            $pago->id_pedido = $data['id_pedido'];
            $pago->monto = $data['monto'];
            $pago->metodo = $data['metodo'];
            $pago->fecha = $data['fecha'];
            $pago->estado = $data['estado'];
            $pago->updated_at = now();

            // Actualizar los datos del pago
            $pago->save();

            // Redireccionar
            return redirect('/Pagos/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar la pago
        Pago::destroy($id);

        //Retornar respuesta JSON
        return response()->json(['res' => true]);
    }
}
