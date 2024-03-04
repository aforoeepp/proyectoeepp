<?php

namespace App\Http\Controllers\Revisionca;

use App\Exports\RevisioncaExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\RevisioncaImport;
use App\Models\revisionca\Revisionca;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{

    //pagina principal de el index
    public function index(){
        $revisionca=Revisionca::select('ruta')->groupBy('ruta')->orderBy('ruta', 'asc')->get();
        //return $revisionca;
       return view('revisionca.index', compact('revisionca'));
    }

     /**
     * Con este metodo mostramos la vista de importar
     */
    public function importarexcel()
    {
        return view('revisionca.importarexcel');
    }

    /**
     * Con este metodo importamos el archivo en excel
     */
    public function createimportarexcel(Request $request)
    {
        $file=$request->file('import_file');
        Excel::import(new RevisioncaImport, $file);           
       return redirect()->route('revisionca.importarexcel')->with('info', 'Archivo importado correctamente!');
    }
     /**
     * Con este metodo exportamos un excel
     */
    public function exportarexcel()
    {
       return Excel::download(new RevisioncaExport, 'revisionca.xlsx');
    }


      /**
     * Con este metodo mostramos la vista de exportar
     */
    public function exportar()
    {     
        return view('revisionca.exportarexcel');
    }

    public function mostrarlistaderutas(Request $request){
        //la opcion cero es para mirar la lista
        if ($request->opc == '0') {
            $revisionca = Revisionca::where('ruta', $request->ruta)
            ->where('estado','0')
            ->orderBy('codigo', 'asc')->get();
            return response(json_encode($revisionca), 200)->header('content-type', 'text/plain');
        }
        // la opcion 1 es para mirar el seguimiento
        if ($request->opc == '1') {
           /* $revisionca = Revisionca::where('estado', '1')
            ->orderBy('nombre', 'asc')->get();*/
            $revisionca = Revisionca::selectRaw("id, 
                                codigo , 
                                nombre, 
                                direccion, 
                                CASE estado
                                WHEN '0' THEN 'En revisión'
                                WHEN '1' THEN 'Aplica'
                                ELSE 'No aplica' END AS estado, observacion")->whereIn('estado', ['1'])
                                ->where('ruta', $request->ruta)->orderBy('updated_at', 'desc')->get();
            return response(json_encode($revisionca), 200)->header('content-type', 'text/plain');
        }
    }

    public function updateseguimiento(Request $request){
      /*  $request->validate([
            'revision'=>'required',           
             'observacion'=>"required"  //esta es otra forma
         ] );*/
         $data = [];
         try {  
            $request->validate([
                'estado'=>'required',           
                 'observacion'=>"required"  //esta es otra forma
             ] );        

             Revisionca::where('id', $request->id)
                 ->update([
                     'estado' => $request->estado,
                     'observacion' => $request->observacion
                ]);

             
             return response()->json([
                'respuesta' => true,
                 'mensaje' => 'Seguimiento guardado correctamente'
             ]);         
        }catch (\Exception $e) {
            return response()->json([
                'respuesta' => false,
                'mensaje' => $e->getMessage()
            ]);
        }

         
    }
}
