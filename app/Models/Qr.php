<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Qr
 *
 * @property int $id
 * @property int $lesson_id
 * @property int|null $qr_status_id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lesson $lesson
 * @method static \Database\Factories\QrFactory factory(...$parameters)
 * @method static Builder|Qr newModelQuery()
 * @method static Builder|Qr newQuery()
 * @method static Builder|Qr query()
 * @method static Builder|Qr whereCreatedAt($value)
 * @method static Builder|Qr whereId($value)
 * @method static Builder|Qr whereLessonId($value)
 * @method static Builder|Qr whereName($value)
 * @method static Builder|Qr whereQrStatusId($value)
 * @method static Builder|Qr whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attendance[] $attendances
 * @property-read int|null $attendances_count
 */
class Qr extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = true;

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'qr_id', 'id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }


}
