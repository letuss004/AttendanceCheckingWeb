<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Admin
 *
 * @property string $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = true;
    public $incrementing = false;

    /**
     * Save a new model with relationship then return the instance.
     *
     * @param array $attributes
     * @return Builder|Model
     */
    public static function createWithRel(array $attributes = []): Model|Builder
    {
        $user = (new User)->firstOrCreate([
            'id' => $attributes['id'],
            'email' => $attributes['email'],
            'username' => $attributes['id'],
            'user_type_id' => 3,
            'name' => $attributes['name'],
            'password' => \Hash::make($attributes['password']),
            'department_id' => $attributes['department_id'],
        ]);
        Admin::firstOrCreate([
            'id' => $user->id
        ]);
        Temporary::firstOrCreate([
            'user_id' => $user->id,
            'user_password' => $attributes['password'],
        ]);
        return $user;
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
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
