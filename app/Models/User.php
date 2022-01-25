<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\User
 *
 * @property string $id
 * @property string $email
 * @property string $username
 * @property int $user_type_id
 * @property string $name
 * @property string $password
 * @property int $department_id
 * @property Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Student|null $student
 * @property-read \App\Models\Teacher|null $teacher
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\UserType $userType
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDepartmentId($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUserTypeId($value)
 * @method static Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Department|null $department
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Supper important
     */
    protected $guarded = [];
    public $timestamps = true;
    public $incrementing = false;
    protected $rememberTokenName = true;

    /**
     * @param Contracts\HasAbilities $accessToken
     */
    public function setAccessToken(Contracts\HasAbilities $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Save a new model with relationship then return the instance.
     *
     * @param array $attributes
     * @return Builder|Model
     * @static
     */
    public static function createWithRel(array $attributes = []): Model|Builder
    {
        /** @var Builder $instance */
        $user = User::create($attributes);
        $type = $user->user_type_id;
        if ($type == 1) {
            Student::create($user);
        } else if ($type == 2) {
            Teacher::create($user);
        } else if ($type == 3) {
            Admin::create($user);
        }
        return $user;
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'id', 'id');
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, 'id', 'id');
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }
}
