<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class DescEquipment extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_desc_equipment';

    protected $fillable = ['name', 'code', 'lang'];
}
