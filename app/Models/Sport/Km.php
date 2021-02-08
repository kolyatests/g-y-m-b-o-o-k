<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Km extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_kms';
}
