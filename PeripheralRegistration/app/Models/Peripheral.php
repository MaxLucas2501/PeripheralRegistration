<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Peripheral extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'vendor',
        'type',
        'serial_number',
        'sku',
        'ean',
        'max_id',
        'internal_number',
    ];

    /**
     *
     */
    public function user(): ?HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    /**
     * @return User|null
     */
    public function activeUser(): ?User
    {
        $user = $this->user();

        if (!($user instanceof User)) {
            return null;
        }

        if ($user->active === 0) {
            return null;
        }
        return $user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules(): array
    {
        return [
            'user_id'         => 'numeric',
            'name'            => 'required|string|max:255',
            'vendor'          => 'required|string|max:255',
            'type'            => 'required|string|max:50',
            'serial_number'   => 'required|string|max:50',
            'sku'             => 'required|string|max:12',
            'ean'             => 'required|string|max:13',
            'max_id'          => 'required|string|max:10',
            'internal_number' => 'required|string|max:52'
        ];
    }
}
