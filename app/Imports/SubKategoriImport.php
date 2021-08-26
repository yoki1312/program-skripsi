<?php

namespace App\Imports;

use App\Models\SubKategori;
use Maatwebsite\Excel\Concerns\ToModel;

class SubKategoriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubKategori([
            'nama_subKategori' => $row[0]
        ]);
    }
}
