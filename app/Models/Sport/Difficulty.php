<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Difficulty extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_difficulties';

    protected $fillable = ['name', 'code', 'lang'];
}
