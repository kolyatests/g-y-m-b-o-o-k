<?php

namespace App\Models\Shop;

use App\Models\User;
use App\Models\Sport\BaseModel;
use App\Models\Sport\WorkoutPlanText;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserShopProgram extends BaseModel
{
    protected $fillable = [
        'status',
        'user_id',
        'workout_plan_id',
      ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutText()
    {
        return $this->hasOne(WorkoutPlanText::class, 'workout_plan_id', 'workout_plan_id')->lang();
    }

    public static function getStatusShopped($program)//
    {
        return self::UserId()->where('workout_plan_id', $program->program_week_id)->first()->status ?? '';
    }

    public static function checkShopped($program)//
    {
        if ($program->program_week_id > 10) {
            if (self::getStatusShopped($program) != 2) {
                abort(404);
            }
        }
    }

}
