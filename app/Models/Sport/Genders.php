<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Genders extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_genders';

    protected $fillable = ['name', 'code', 'lang'];
}
