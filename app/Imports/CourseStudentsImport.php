<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseStudentsImport implements ToCollection, WithHeadingRow
{
    private $course;
    private $users;

    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->users = $course->students;
    }


    public function collection(Collection $collection)
    {
        // TODO: Implement collection() method.
//        foreach ($collection as $item) {
//            $user = User::findOrFail($item['id']);
//            $this->course->students()->attach($user);
//        }
        return $collection;
    }
}
