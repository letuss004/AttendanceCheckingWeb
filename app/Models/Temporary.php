<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Temporary
 *
 * @property int $id
 * @property string $user_id
 * @property string $user_password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Temporary whereUserPassword($value)
 * @mixin \Eloquent
 */
class Temporary extends Model
{
    use HasFactory;
    protected $guarded = [];
}
