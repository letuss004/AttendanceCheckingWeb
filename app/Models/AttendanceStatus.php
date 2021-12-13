<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AttendanceStatus extends Model
{
    use HasFactory;

    public function attendance(): HasOne
    {
        return $this->hasOne(Attendance::class);
    }
}
