<?php

namespace App\Http\Controllers\Aforo;

use App\Http\Controllers\Controller;
use App\Models\aforo\Ruta;
use Illuminate\Http\Request;

class AforoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {      // $revisionca=Revisionca::select('ruta')->groupBy('ruta')->orderBy('ruta', 'asc')->get(); 
        $rutas= Ruta::get();
        return view('aforo.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     /**
     * Con este mostramos la vista de prueba para el pad de firmas
     */
    public function firma()
    {
        return view('aforo.firma');
    }

    public function firmados()
    {
        return view('aforo.firmados');
    }

}
