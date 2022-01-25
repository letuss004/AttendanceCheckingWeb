<?php

namespace App\Models;

use Database\Factories\LessonFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property int $course_id
 * @property int $teacher_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attendance[] $attendances
 * @property-read int|null $attendances_count
 * @property-read \App\Models\Course $courses
 * @property-read \App\Models\Teacher $teacher
 * @method static LessonFactory factory(...$parameters)
 * @method static Builder|Lesson newModelQuery()
 * @method static Builder|Lesson newQuery()
 * @method static Builder|Lesson query()
 * @method static Builder|Lesson whereCourseId($value)
 * @method static Builder|Lesson whereCreatedAt($value)
 * @method static Builder|Lesson whereId($value)
 * @method static Builder|Lesson whereTeacherId($value)
 * @method static Builder|Lesson whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $name
 * @method static Builder|Lesson whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Qr[] $qrs
 * @property-read int|null $qrs_count
 * @property-read \App\Models\Course $course
 */
class Lesson extends Model
{
    use HasFactory;

    /*
     * Supper important
     */
    protected $guarded = [];
    public $timestamps = true;

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function qrs(): HasMany
    {
        return $this->hasMany(Qr::class, 'lesson_id', 'id');
    }
}
