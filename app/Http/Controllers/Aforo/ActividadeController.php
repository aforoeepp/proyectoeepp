<?php

namespace App\Http\Controllers\Aforo;

use App\Http\Controllers\Controller;
use App\Models\aforo\Actividade;
use Illuminate\Http\Request;

class ActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividade::all();
        return view('aforo.actividade.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aforo.actividade.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'   
        ]);

        $actividade= new Actividade();
        $actividade->name=$request->name;     
        $actividade-> save();

        return redirect()->route('aforo.actividade.index')->with('info', 'La actividad económica se creó con exito');
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
    public function edit(Actividade $actividade)
    {
        return view('aforo.actividade.edit', compact('actividade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actividade $actividade)
    {
        $request->validate([
            'name'=>'required'  
        ]);
        
        //$user= new User();
        $actividade->name=$request->name;      
        $actividade-> save();

        return redirect()->route('aforo.actividade.index')->with('info', 'La actividad economica se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
