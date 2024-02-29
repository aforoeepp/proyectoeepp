<?php

namespace App\Http\Controllers\Aforo;

use App\Http\Controllers\Controller;
use App\Models\aforo\Actividade;
use App\Models\aforo\Category;
use App\Models\aforo\Cliente;
use App\Models\aforo\Ruta;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id'); // esto es para pasarle a laravel collection  
        $actividades = Actividade::pluck('name', 'id'); // esto es para pasarle a laravel collection  
        $rutas = Ruta::pluck('name', 'id'); 
     
        return view('aforo.cliente.create', compact('categories', 'actividades','rutas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipoaforo'=>'required' ,
            'tiporesiduos'=>'required' ,
            'nombre'=>'required' ,
            'codigousuario'  =>'required|unique:clientes' ,
            'correo'=>'required' 
        ]);
       
        $cliente=Cliente::create($request->all()); 

        return redirect()->route('aforo.cliente.create')->with('info', 'El cliente se creó con exito');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
