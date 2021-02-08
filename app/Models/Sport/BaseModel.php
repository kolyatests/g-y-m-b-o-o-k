<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeUserId($query)
    {
        return $query->whereUserId(session('id'));
    }

    public function scopeUserById($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopeLang($query)
    {
        return $query->whereLang(session('lang_id', 'rus'));
    }

    public function scopeLangBy($query, $type, int $program)
    {
        return $query->where($type, $program)->whereLang(session('lang_id', 'rus'));
    }

}
