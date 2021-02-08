<?php

namespace App\Models\Sport;

use App\Models\User;

class UserTraining extends BaseModel
{
    protected $fillable = [
        'user_id',
        'user_program_id',
        'program_week_id',
        'exercise_id',
        'exercise',
        'repmin',
        'kgkm',
        'id',
        'description'
        ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function userProgram()
    {
        return $this->belongsTo(UserProgram::class, 'user_program_id', 'user_program_id')->UserId();
    }

    public function userProgramWeek()
    {
        return $this->belongsTo(UserProgramWeek::class, 'program_week_id', 'program_week_id')->UserId();
    }

    public function exerciseName()
    {
        return $this->hasOne(ExerciseText::class, 'exercise_id', 'exercise_id');
    }

     public function scopeProgramWeekExercise($query, $exercise, $day, int $program)
    {
        return $query->UserId()->where('program_week_id', $program)->where('user_program_id', $day)
            ->where('exercise_id', $exercise);
    }

    public function scopeUserWeek($query, int $program)
    {
        return $query->UserId()->where('program_week_id', $program);
    }

    public function scopeUserWeekProgram($query, $day, int $program)
    {
        return $query->UserId()->where('program_week_id', $program)->where('user_program_id', $day);
    }

    public function scopeUserProgram($query, $day)
    {
        return $query->UserId()->where('user_program_id', $day);
    }

    public function scopeUserExercise($query, $exercise)
    {
        return $query->UserId()->where('exercise_id', $exercise);
    }

    public function scopeProgramUser($query, $id, $program)
    {
        return $query->where('user_id', $id)->where('user_program_id', $program);
    }

    public function scopeExerciseUser($query, $id, $exercise)
    {
        return $query->where('user_id', $id)->where('exercise_id', $exercise);
    }

    public function move(UserTraining $exercise2)
    {
        UserTraining::whereId(1)->delete();
        $move1 = $this->id;
        $move2 = $exercise2->id;
        $this->update(['id' => 1]);
        $exercise2->update(['id' => $move1]);
        $this->update(['id' => $move2]);
        UserTraining::whereId(1)->delete();
    }
}
