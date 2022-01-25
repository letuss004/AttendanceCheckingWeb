<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel, ToArray
{
    private $course;

//    /**
//     * @param Course $course
//     */
//    public function __construct(Course $course)
//    {
//        $this->course = $course;
//    }

    public function array(array $array): array
    {
        return $array;
    }

    public function model(array $row)
    {
        // TODO: Implement model() method.
    }
}
