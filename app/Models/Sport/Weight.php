<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_weights';
}
