<?php

namespace App\Models\Sport;

use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strings extends BaseModel
{
    use SoftDeletes;

    protected $table = 'strings';

    protected $fillable = ['name', 'text', 'lang'];

    public function scopeName($query, $name)
    {
        $lang = auth()->user()->lang_id;

        return $query->where('name', $name)->whereLang($lang);
    }

    public static function StringFor($coll, $name)
    {
        return $coll->where('name', $name)->first()->text;
    }
}
