<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AbilityRole extends Pivot
{
    use HasFactory;

    protected $table = 'ability_role';

}
