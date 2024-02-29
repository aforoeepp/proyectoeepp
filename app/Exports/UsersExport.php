<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UsersExport implements FromView
{

    public function view(): View
    {
        return view('revisionca.exports.invoices', [
            'invoices' => User::all()
        ]);
    }
   

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //   //  $users = DB::table('Users')->select('id','name', 'email')->get();
    //     return User::all();
    // }
}
