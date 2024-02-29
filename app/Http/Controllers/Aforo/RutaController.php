<?php

namespace App\Http\Controllers\Aforo;

use App\Http\Controllers\Controller;
use App\Models\aforo\Ruta;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutas = Ruta::all();
        return view('aforo.ruta.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aforo.ruta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
       $request->validate([
        'name'=>'required' , 
        'descripcion'=>'required' 
    ]);

    $ruta= new Ruta();
    $ruta->name=$request->name;    
    $ruta->descripcion=$request->descripcion;    
    $ruta-> save();

    return redirect()->route('aforo.ruta.index')->with('info', 'la ruta se creó con exito');
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
    public function edit(Ruta $ruta)
    {
        return view('aforo.ruta.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruta $ruta)
    {
        $request->validate([
            'name'=>'required',
            'descripcion'=>'required'
        ]);
        
        //$user= new User();
        $ruta->name=$request->name;    
        $ruta->descripcion=$request->descripcion;    
        $ruta-> save();

        return redirect()->route('aforo.ruta.index')->with('info', 'La ruta se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
