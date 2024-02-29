<?php

namespace App\Exports;


use App\Models\revisionca\Revisionca;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class RevisioncaExport implements FromView
{
    public function view(): View
    {
        return view('revisionca.exports.invoices', [
            'invoices' => Revisionca::all()
        ]);
    }
}
