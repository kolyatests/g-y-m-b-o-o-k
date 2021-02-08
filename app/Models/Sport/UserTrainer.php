<?php

namespace App\Models\Sport;

class UserTrainer extends BaseModel
{
    protected $table = 'user_trainers';

    protected $fillable = [
        'user_id',
        'trainer_id',
        ];

}
