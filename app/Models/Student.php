<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Eloquent as EloquentAlias;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;


/**
 * App\Models\Student
 *
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Models\Attendance[] $attendances
 * @property-read int|null $attendances_count
 * @property-read Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read Department $department
 * @property-read User $user
 * @method static StudentFactory factory(...$parameters)
 * @method static Builder|Student newModelQuery()
 * @method static Builder|Student newQuery()
 * @method static Builder|Student query()
 * @method static Builder|Student whereCreatedAt($value)
 * @method static Builder|Student whereId($value)
 * @method static Builder|Student whereUpdatedAt($value)
 * @mixin EloquentAlias
 */
class Student extends Model
{
    use HasFactory;

    /*
     * Supper important
     */
    protected $guarded = [];
    public $timestamps = true;
    public $incrementing = false;

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_student');
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
