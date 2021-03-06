<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;



/**
 * App\Models\CourseList
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @method static Builder|CourseList newModelQuery()
 * @method static Builder|CourseList newQuery()
 * @method static Builder|CourseList query()
 * @method static Builder|CourseList whereCreatedAt($value)
 * @method static Builder|CourseList whereId($value)
 * @method static Builder|CourseList whereName($value)
 * @method static Builder|CourseList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseList extends Model
{
    use HasFactory;

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
