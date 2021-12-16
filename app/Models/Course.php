<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;


/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $course_list_id
 * @property int $admin_id
 * @property int $teacher_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Admin $admin
 * @property-read \App\Models\CourseList $courseList
 * @property-read \App\Models\Enrollment|null $coursesRegistration
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \App\Models\Teacher $teacher
 * @method static Builder|Course newModelQuery()
 * @method static Builder|Course newQuery()
 * @method static Builder|Course query()
 * @method static Builder|Course whereAdminId($value)
 * @method static Builder|Course whereCourseListId($value)
 * @method static Builder|Course whereCreatedAt($value)
 * @method static Builder|Course whereId($value)
 * @method static Builder|Course whereTeacherId($value)
 * @method static Builder|Course whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|Course[] $students
 * @property-read int|null $students_count
 */
class Course extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = true;

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function courseList(): BelongsTo
    {
        return $this->belongsTo(CourseList::class);
    }
}
