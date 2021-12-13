<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Teacher
 *
 * @method static \Database\Factories\TeacherFactory factory(...$parameters)
 * @method static Builder|Teacher newModelQuery()
 * @method static Builder|Teacher newQuery()
 * @method static Builder|Teacher query()
 * @mixin \Eloquent
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Teacher whereCreatedAt($value)
 * @method static Builder|Teacher whereId($value)
 * @method static Builder|Teacher whereUpdatedAt($value)
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\Lesson|null $lesson
 * @property-read \App\Models\User $user
 * @property int $department_id
 * @method static Builder|Teacher whereDepartmentId($value)
 */
class Teacher extends Model
{
    use HasFactory;

    public function lesson(): HasOne
    {
        return $this->hasOne(Lesson::class);
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
