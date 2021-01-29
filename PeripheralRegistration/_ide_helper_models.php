<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ability
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereUpdatedAt($value)
 */
	class Ability extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Peripheral
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $vendor
 * @property string $type
 * @property string $serial_number
 * @property string $sku
 * @property string $ean
 * @property string $max_id
 * @property string $internal_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral query()
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereEan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereInternalNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereMaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Peripheral whereVendor($value)
 */
	class Peripheral extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PeripheralUser
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|PeripheralUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PeripheralUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PeripheralUser query()
 */
	class PeripheralUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Request
 *
 * @property int $id
 * @property int $user_id
 * @property int $peripheral_id
 * @property int $approved
 * @property string $approved_at
 * @property string $approved_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Peripheral|null $peripheral
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request newQuery()
 * @method static \Illuminate\Database\Query\Builder|Request onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Request query()
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request wherePeripheralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Request withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Request withoutTrashed()
 */
	class Request extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $active
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Peripheral[] $Peripherals
 * @property-read int|null $peripherals_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Request[] $requests
 * @property-read int|null $requests_count
 * @property-read \App\Models\Role $roles
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

