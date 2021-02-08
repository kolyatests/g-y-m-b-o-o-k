<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class DescDifficulty extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_desc_difficulties';
}
