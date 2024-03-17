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
        date_default_timezone_set('America/Lima'); 
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
    public function edit()
    {
        $categories = Category::pluck('name', 'id'); // esto es para pasarle a laravel collection  
        $actividades = Actividade::pluck('name', 'id'); // esto es para pasarle a laravel collection  
        $rutas = Ruta::pluck('name', 'id'); 
        return view('aforo.cliente.edit', compact('categories', 'actividades', 'rutas'));
    }

    //listar clientes por api
    public function mostrarlistadeclientes(Request $request){
        //la opcion cero es para listar un solo cliente
        if ($request->opc == '0') {
            $cliente = Cliente::where('codigousuario', $request->codigousuario)->get();
            return response(json_encode($cliente), 200)->header('content-type', 'text/plain');
        }

        //la opcion 1 es para buscar un usuario por nombre
        if ($request->opc == '1') {
            $cliente = Cliente::where('nombre', 'like',"%{$request->nombre}%" )->get();
            return response(json_encode($cliente), 200)->header('content-type', 'text/plain');
        }
        
    }


    /**
     * Actualizar cliente en la base de datos
     */
    public function update(Request $request)
    {
        date_default_timezone_set('America/Lima'); 
        $request->validate([
            'tipoaforo'=>'required' ,
            'tiporesiduos'=>'required' ,
            'nombre'=>'required' ,
            'codigousuario'  =>'required' ,
            'correo'=>'required' 
        ]);

        $cliente = Cliente::where('codigousuario', $request->codigousuario);
        $cliente->update($request->except(['_token']) ); //con este actualizamos el usuario

        return redirect()->route('aforo.cliente.edit')->with('info', 'El usuario se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
