<?php

namespace App\Models\Sport;

use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends BaseModel
{
    use SoftDeletes;

    protected $table = 'sport_exercises';

    public function resolveRouteBinding($exercise, $field = null)///
    {
        return $this->where('exercise_id', $exercise)->first();
    }

    public function exerciseText()//
    {
        return $this->hasOne(ExerciseText::class, 'exercise_id', 'exercise_id')->lang();
    }

    public function exerciseDifficulty()//
    {
        return $this->hasOne(Difficulty::class, 'code', 'difficulty')->lang();
    }

    public function exerciseDescEquipment()//
    {
        return $this->hasOne(DescEquipment::class, 'code', 'equipment')->lang();
    }

    public function scopeExercise($query, $exercise)
    {
        return $query->where('exercise_id', $exercise);
    }

    public function existsOrCreateUserTraining($day)//
    {
        $user = auth()->user();
        if (UserProgram::find($day)->userTrainings->contains('exercise_id', $this->exercise_id)) {
            return redirect()->route('sport.my.program.day', $day);
        }
        $useWeight = $this->use_weight;
        $userProgram = UserProgram::find($day);
        UserTraining::create(
            [
                'user_id' => $user->id,
                'user_program_id' => $userProgram->user_program_id,
                'exercise_id' => $this->exercise_id,
                'program_week_id' => $userProgram->userProgramWeek->program_week_id,
                'repmin' => ($useWeight != 2 && $useWeight != 3) ? __('gym.resultadd_numb') : __('gym.resultadd_min'),
                'kgkm' => ($useWeight != 2 && $useWeight != 3) ? ($user->weight->name) : ($user->km->name),
            ]
        );
    }


    public function getExerciseDescription($program)//
    {
        $eqipa = null;
        $exercise = $this->where('exercise_id', $program->exercise_id)
            ->with('exerciseText', 'exerciseDifficulty', 'exerciseDescEquipment')->first();
        $muscleFirst = $exercise->muscle_first;
        $muscleSecond = $exercise->muscle_second;
        if (($muscleFirst != 0) && (strlen($muscleFirst) == 1)) {
            $muscleFirst = Muscles::langBy('code', $muscleFirst)->value('name');
            $eqipa = $eqipa . '<strong>' . __('gym.muscle_first') . '</strong>' . $muscleFirst . '<br>';
        }
        if (($muscleFirst != 0) && (strlen($muscleFirst) != 1)) {
            $muscle = null;
            $muscles = Muscles::whereIn('code', (explode(';', $muscleFirst)))->lang()->get();
            foreach ($muscles as $muscleFirst) {
                $muscle = $muscle . ',' . $muscleFirst->name;
            }
            $muscleFirst = substr($muscle, 1);
            $eqipa = $eqipa . '<strong>' . __('gym.muscle_first') . '</strong>' . $muscleFirst . '<br>';
        }
        if (($muscleSecond != 0) && (strlen($muscleSecond) == 1)) {
            $muscleSecond = Muscles::langBy('code', $muscleSecond)->value('name');
            $eqipa = $eqipa . '<strong>' . __('gym.muscle_second') . '</strong>' . $muscleSecond . '<br>';
        }
        if (($muscleSecond != 0) && (strlen($muscleSecond) != 1)) {
            $muscle = null;
            $muscles = Muscles::whereIn('code', (explode(';', $muscleSecond)))->lang()->get();
            foreach ($muscles as $muscleSecond) {
                $muscle = $muscle . ',' . $muscleSecond->name;
            }
            $muscleSecond = substr($muscle, 1);
            $eqipa = $eqipa . '<strong>' . __('gym.muscle_second') . '</strong>' . $muscleSecond . '<br>';
        }
        $difficulty = $exercise->exerciseDifficulty->name;
        $eqipa = $eqipa . '<strong>' . __('gym.difficulty_level') . '</strong>' . $difficulty . '<br>';
        $equipment = $exercise->exerciseDescEquipment->name;
        $visible = (session('check', 0) == 1) ? true : false;
        $all = [
            'cardExercise' => [
                [
                    'name' => '/exer_cisesmuscle',
                    'text' => __('gym.graphic_all_category'),
                    'img' => '/storage/image/menu_categ/menu_categ_0.png',
                ],
            ],
            'description' => $exercise->exerciseText->name,
            'image' => '/storage/image/exercises/desc_' . $program->exercise_id . '.gif',
            'exercise_text' => $exercise->exerciseText->text,
            'eqipa' => $eqipa . '<strong>' . __('gym.equipment_level') . '</strong>' . $equipment . '<br>',
            'program' => $program->exercise_id,
            'visible' => $visible,
        ];

        return $all;
    }

}
