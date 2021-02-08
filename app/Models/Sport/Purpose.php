<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Purpose extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_purposes';

    protected $fillable = ['name', 'code', 'lang'];
}
