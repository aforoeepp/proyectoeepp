<?php

namespace App\Exports;


use App\Models\revisionca\Revisionca;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RevisioncaExport implements FromView
{
    public function view(): View
    {
        //Revisionca::all()
        return view('revisionca.exports.invoices', [
            'invoices' => Revisionca::selectRaw("id,ruta,codigo,lecturaan,consumoan,lecturaac,consumoac, 
            promedio , causadenol,nombre,estrato,direccion,nmedidor,                                  
                                CASE estado
                                    WHEN '0' THEN 'En revisión'
                                     WHEN '1' THEN 'Aplica'
                                     ELSE 'No aplica' END AS estado,lecturar, observacion,created_at,updated_at")->get()
        ]);
    }
}
