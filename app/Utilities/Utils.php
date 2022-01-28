<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Collection;

class Utils
{
    /**
     * @param string $department
     * @param Collection $list
     * @return int
     */
    public static function getDepartment(string $department, Collection $list): int
    {
        return $list->where('department', '=', $department)->first()->id;
    }
}
