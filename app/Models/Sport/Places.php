<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Places extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_places';

    protected $fillable = ['name', 'code', 'lang'];
}
