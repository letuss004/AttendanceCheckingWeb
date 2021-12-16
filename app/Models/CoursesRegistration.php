<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\CoursesRegistration
 *
 * @property int $id
 * @property int $course_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $student
 * @property-read int|null $student_count
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesRegistration whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CoursesRegistration extends Model
{
    use HasFactory;

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
