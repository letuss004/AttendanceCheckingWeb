<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property string $user_id
 * @property int $department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lesson[] $lessons
 * @property-read int|null $lessons_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\TeacherFactory factory(...$parameters)
 * @method static Builder|Teacher newModelQuery()
 * @method static Builder|Teacher newQuery()
 * @method static Builder|Teacher query()
 * @method static Builder|Teacher whereCreatedAt($value)
 * @method static Builder|Teacher whereDepartmentId($value)
 * @method static Builder|Teacher whereId($value)
 * @method static Builder|Teacher whereUpdatedAt($value)
 * @method static Builder|Teacher whereUserId($value)
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    use HasFactory;
    /*
         * Supper important
         */
    protected $guarded = [];
    public $timestamps = true;
    public $incrementing = false;
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
