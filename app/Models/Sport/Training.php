<?php

namespace App\Models\Sport;

class Training extends BaseModel
{
    protected $table = 'sport_trainings';

    public function exercises()
    {
        return $this->hasMany(ExerciseText::class, 'exercise_id', 'exercise_id')->lang();
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id')->lang();
    }



    public function scopeProgramLang($query, int $program)
    {
        return $query->where('program_id', $program)->Lang();
    }

    public function scopeProgramId($query, int $programId)
    {
        return $query->where('program_id', $programId)->Lang();
    }
}
