<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
    Factories\HasFactory,
    Relations\BelongsTo,
    Relations\HasOne
};

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = ['approved' => 'boolean'];
    protected $fillable = ['approved','user_id','peripheral_id','approved_at','approved_by','created_at','updated_at','deleted_at'];

    /**
     *
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * get the peripheral
     *
     * @return HasOne
     */
    public function peripheral(): HasOne
    {
        return $this->hasOne(
            Peripheral::class,
            'id',
            'peripheral_id'
        );
    }

    public static function rules(): array
    {
        return [
            'approved'    => '',
            'approved_by' => '',
        ];
    }
}
