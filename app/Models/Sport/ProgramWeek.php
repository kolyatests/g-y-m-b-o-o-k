<?php

namespace App\Models\Sport;

use App\Models\Shop\UserShopProgram;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramWeek extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_program_weeks';

    public function resolveRouteBinding($program, $field = null)///
    {
        return $this->where('program_week_id', $program)->lang()->first();
    }

    public function programs()///
    {
        return $this->hasMany(Program::class, 'program_week_id', 'program_week_id')->lang();
    }

    public function programByDay($day)
    {
        return $this->hasMany(Program::class, 'program_week_id', 'program_week_id')
            ->where('program_id', $day)->Lang();
    }

    public function programsByProgramWeek($dayWeek, $program)
    {
        return $this->hasMany(Program::class, 'program_week_id', 'program_week_id')
            ->where('program_week_id', $program)->where('program_id', $dayWeek)->Lang();
    }

    public function workoutPlans()
    {
        return $this->hasMany(WorkoutPlan::class, 'workout_plan_id', 'program_week_id');
    }

    public function workoutPlan()
    {
        return $this->hasOne(WorkoutPlan::class, 'workout_plan_id', 'program_week_id');
    }

    public function workoutPlanTexts()
    {
        return $this->hasMany(WorkoutPlanText::class, 'workout_plan_id', 'program_week_id');
    }

    public function trainings(int $id)
    {
        $weekDay = Program::where('program_week_id', $id)->pluck('program_id')->toArray();
        return Training::whereIn('program_id', $weekDay);
    }

    public function deleteCompletely(int $id)
    {
        $this->workoutPlans()->delete();
        $this->workoutPlanTexts()->delete();
        self::trainings($id)->delete();
        $this->programs()->delete();
        self::where('program_week_id', $id)->forceDelete();
    }













    public function scopeWeekLang($query, int $program)
    {
        return $query->where('program_week_id', $program)->Lang();
    }





    public static function findByLang(int $program)
    {
        return self::where('program_week_id', $program)->Lang()->first();
    }

}
