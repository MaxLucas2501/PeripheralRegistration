<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsTo,
    Relations\HasMany,
    Relations\HasManyThrough};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *
     */
    public function Peripherals(): HasMany
    {
        return $this->hasMany(Peripheral::class);
    }

    /**
     *
     */
    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

    ///**
    // *
    // */
    //public function roles(): BelongsTo
    //{
    //    return $this->belongsTo(Role::class);
    //}

    /**
     * @param $role
     */
    public function assignRole($role)
    {
        $this->roles()->save($role);
    }

    /**
     * @return HasManyThrough
     */
    public function roles(): HasManyThrough
    {
        return $this->hasManyThrough(
            Role::class,
            RoleUser::class,
            'user_id',
            'id',
            'id',
            'role_id'
        );
    }

    /**
     * @return HasManyThrough
     */
    public function abilities(): Collection
    {
        $abilityCollection = new Collection();

        $this->roles()
             ->each(static function (Role $role) use (&$abilityCollection) {
                $role->abilities();
            $abilityCollection->concat(

            );
        });

        return $abilityCollection;
    }

    /**
     * @param string $slug
     *
     * @return bool
     */
    public function hasAbility(string $slug): bool
    {
        return $this->abilities()
             ->where('slug', $slug)
             ->exists();
    }

    /**
     * @param string $slug
     *
     * @return bool
     */
    public function hasRole(string $slug): bool
    {
        return $this->roles()
             ->where('slug', $slug)
             ->exists();
    }
}
