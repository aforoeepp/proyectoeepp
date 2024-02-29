<?php

namespace App\Imports;

use App\Models\revisionca\Revisionca;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RevisioncaImport implements ToModel, WithBatchInserts, WithChunkReading,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Revisionca([
            'ruta'     => $row['ruta'],
             'codigo'    => $row['codigo'], 
             'lecturaan'    => $row['lecturaan'], 
             'consumoan'    => $row['consumoan'], 
             'lecturaac'    => $row['lecturaac'], 
             'consumoac'    => $row['consumoac'], 
             'promedio'    => $row['promedio'], 
             'causadenol'    => $row['causadenol'], 
             'nombre'    => $row['nombre'], 
             'estrato'    => $row['estrato'], 
             'direccion'    => $row['direccion'], 
             'nmedidor'    => $row['nmedidor'], 
             'estado'    => '0', 
           //'password' => Hash::make($row[2]),
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
