<?php

namespace App\Http\Controllers\Aforo;

use App\Http\Controllers\Controller;
use App\Models\aforo\Recipiente ;
use App\Models\aforo\Recipientedetalle;
use Illuminate\Http\Request;

class RecipienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipientes = Recipiente::all();
        return view('aforo.recipiente.index', compact('recipientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aforo.recipiente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->password_confirmation);
        $request->validate([
            'name'=>'required'   
        ]);

        $recipiente= new Recipiente();
        $recipiente->name=$request->name;     
        $recipiente-> save();

        return redirect()->route('aforo.recipiente.index')->with('info', 'El recipiente se creó con exito');
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
    public function edit(Recipiente $recipiente)
    {
        return view('aforo.recipiente.edit', compact('recipiente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipiente $recipiente)
    {
        $request->validate([
            'name'=>'required'  
        ]);
        
        //$user= new User();
        $recipiente->name=$request->name;      
        $recipiente-> save();

        return redirect()->route('aforo.recipiente.index')->with('info', 'El recipiente se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //guardamos el detalle de un recipiente 
    public function guardardetalleseguimiento(Request $request){      
        try {  
           $request->validate([
               'descripcion'=>'required',           
                'dimensiones'=>"required",  
                'equivalencia'=>"required",
                'recipiente_id'=>"required"
            ] );   

               $recipientedetalle= new Recipientedetalle();
               $recipientedetalle->descripcion=$request->descripcion;  
               $recipientedetalle->dimensiones=$request->dimensiones;    
               $recipientedetalle->equivalencia=$request->equivalencia;  
               $recipientedetalle->recipiente_id=$request->recipiente_id;  
               $recipientedetalle-> save();

            
            return response()->json([
               'respuesta' => true,
                'mensaje' => 'Detalle guardado correctamente'
            ]);         
       }catch (\Exception $e) {
           return response()->json([
               'respuesta' => false,
               'mensaje' => $e->getMessage()
           ]);
       }
    }
    
    public function mostrardetallerecipiente(Request $request){
        //la opcion cero es para mirar la lista     
            $recipientedetalle = Recipientedetalle::where('recipiente_id', $request->recipiente_id)
            ->orderBy('id', 'desc')->get();
            return response(json_encode($recipientedetalle), 200)->header('content-type', 'text/plain'); 
    }
}
