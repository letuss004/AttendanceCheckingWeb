<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



/**
 * App\Models\AttendanceStatus
 *
 * @property int $id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attendance[] $attendances
 * @property-read int|null $attendances_count
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AttendanceStatus extends Model
{
    use HasFactory;

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
