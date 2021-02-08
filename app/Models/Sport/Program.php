<?php

namespace App\Models\Sport;

class Program extends BaseModel
{
    protected $table = 'sport_programs';

//    public function resolveRouteBinding($day, $field = null)///
//    {
//        return $this->where('program_week_id', $day)->lang()->first();
//    }

    public function training()
    {
        return $this->hasMany(Training::class, 'program_id', 'program_id')->lang();
    }


    public function programWeek()
    {
        return $this->belongsTo(ProgramWeek::class, 'program_week_id', 'program_week_id')->lang();
    }

    public function trainingByProgramId($day)
    {
        return $this->hasMany(Training::class, 'program_id', 'program_id')
            ->where('program_id', $day)->Lang();
    }

    public function scopeWeekLang($query, int $program)
    {
        return $query->where('program_week_id', $program)->Lang();
    }

    public function scopeProgramWeekId($query, int $programWeekId)
    {
        return $query->where('program_week_id', $programWeekId)->Lang();
    }

    public function scopeProgramWeekIdProgramId($query, int $programWeekId, int $programId)
    {
        return $query->where('program_week_id', $programWeekId)->where('program_id', $programId)->Lang();
    }
}
