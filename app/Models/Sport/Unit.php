<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_units';
}
