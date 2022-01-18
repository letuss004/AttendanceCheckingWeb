<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
//        dd(new Student([
//            'id' => $row["ID"],
//        ]));
        return new Student([
            'id' => $row["ID"],
        ]);
    }
}
