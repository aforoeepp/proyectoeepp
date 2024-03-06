<?php

namespace App\Exports;


use App\Models\revisionca\Revisionca;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RevisioncaExport implements FromView
{
    public function view(): View
    {
        // $revisionca = Revisionca::selectRaw("id, 
        //                         codigo , 
        //                         nombre, 
        //                         direccion, 
        //                         CASE estado
        //                         WHEN '0' THEN 'En revisión'
        //                         WHEN '1' THEN 'Aplica'
        //                         ELSE 'No aplica' END AS estado, observacion")->whereIn('estado', ['1'])
        //                         ->where('ruta', $request->ruta)->orderBy('updated_at', 'desc')->get();Revisionca::all()
        return view('revisionca.exports.invoices', [
            'invoices' => Revisionca::selectRaw("id,ruta,codigo,lecturaan,consumoan,lecturaac,consumoac, 
            promedio , causadenol,nombre,estrato,direccion,nmedidor,                                  
                                CASE estado
                                    WHEN '0' THEN 'En revisión'
                                     WHEN '1' THEN 'Aplica'
                                     ELSE 'No aplica' END AS estado, observacion,created_at,updated_at")->get()
        ]);
    }
}
