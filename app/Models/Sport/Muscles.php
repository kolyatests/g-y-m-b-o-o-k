<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Muscles extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_muscles';

    protected $fillable = ['name', 'code', 'lang'];


}
