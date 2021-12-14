<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\CourseList
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course|null $course
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseList extends Model
{
    use HasFactory;

    public function course(): HasOne
    {
        return $this->hasOne(Course::class);
    }
}
