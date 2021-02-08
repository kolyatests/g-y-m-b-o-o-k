<?php

namespace App\Models\Sport;

class WorkoutPlanWeek extends BaseModel
{
    public function scopeWeekLang($query, int $program)
    {
        return $query->where('workout_plan_week_id', $program)->Lang();
    }



}
