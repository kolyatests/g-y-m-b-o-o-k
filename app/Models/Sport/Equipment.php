<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_equipment';

    protected $fillable = ['name', 'code', 'lang'];
}
