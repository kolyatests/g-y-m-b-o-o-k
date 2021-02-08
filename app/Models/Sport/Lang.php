<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Lang extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_langs';

    protected $fillable = ['name', 'code'];
}
