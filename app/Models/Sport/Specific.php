<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Specific extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_specifics';

    protected $fillable = ['name', 'code', 'lang'];
}
