<?php

namespace App\Services;

use App\Models\Sport\DescEquipment;
use App\Models\Sport\Difficulty;
use App\Models\Sport\Exercise;
use App\Models\Sport\ExerciseText;
use App\Models\Sport\Muscles;
use App\Models\Sport\Program;
use App\Models\Sport\ProgramWeek;
use App\Models\Sport\Training;
use App\Models\Sport\UserActivityDays;
use App\Models\Sport\UserProgram;
use App\Models\Sport\UserProgramWeek;
use App\Models\Sport\UserResultSave;
use App\Models\Sport\UserTraining;
use App\Models\Sport\WorkoutPlan;
use App\Models\Sport\WorkoutPlanText;
use App\Models\Sport\WorkoutPlanWeek;
use Illuminate\Validation\Rule;

class Workout
{


    public static function userTrainingMove(int $exercise, int $last, string $day, int $program)
    {
        $user = auth()->user();
        $first = $user->userTrainingByExerciseProgramWeek($exercise, $day, $program)->value('id');
        $second = $user->userTrainingByExerciseProgramWeek($last, $day, $program)->value('id');
        UserTraining::whereId(1)->delete();;
        $user->userTrainingById($first)->update(['id' => 1]);
        $user->userTrainingById($second)->update(['id' => $first]);
        $user->userTrainingById(1)->update(['id' => $second]);
    }

    public static function getMainPage()
    {
        session(['id' => auth()->id()]);
        if (isset($_COOKIE['time']) && isset($_COOKIE['time_s'])) {
            $t1 = explode(' ', $_COOKIE['time']);
            $t2 = $t1[1] . '-' . $t1[2] . '-' . $t1[3] . ' ' . $t1[4];
            $t3 = date_parse_from_format('M-d-Y H:i:s', $t2);
            $t4 = $t3['year'] . '-' . $t3['month'] . '-' . $t3['day'] . ' ' . $t3['hour'] . ':' . $t3['minute'] . ':' . $t3['second'];
            $time = strtotime($t4);
            $time_s = strtotime($_COOKIE['time_s']);
            $offset = $time - $time_s;
            session(['offset' => $offset]);
        }
        if (empty($offset)) {
            $offset = null;
        }
        $date = session('date', 0);
        $dayNow = date('Y-m-d H:i:s');
        $dayNow2 = strtotime($dayNow) + $offset;
        $dayNow = date('d-m-Y', $dayNow2);
        if (!$date || $date == 0) {
            $activityDays = $dayNow;
        } else {
            $activityDaysId2 = explode('-', $date);
            $activityDays = $activityDaysId2[2] . '-' . $activityDaysId2[1] . '-' . $activityDaysId2[0];
        }
        $programWeek = ProgramWeek::where('program_week_id', '>', 1000)->lang()->get();
        $workoutPlanCategories = [
            '1' => WorkoutPlanWeek::weekLang(1)->value('name'),
            '2' => WorkoutPlanWeek::weekLang(2)->value('name'),
            '1001' => $programWeek->where('program_week_id', 1001)->first()->name,
            '1002' => $programWeek->where('program_week_id', 1002)->first()->name,
            '1003' => $programWeek->where('program_week_id', 1003)->first()->name,
            '1004' => $programWeek->where('program_week_id', 1004)->first()->name,
            '1005' => $programWeek->where('program_week_id', 1005)->first()->name,
            '1006' => $programWeek->where('program_week_id', 1006)->first()->name,
            '1009' => $programWeek->where('program_week_id', 1009)->first()->name,
            '1010' => $programWeek->where('program_week_id', 1010)->first()->name,
        ];
        return [
            'muscles' => explode(';', (UserActivityDays::date($date)->value('muscle'))),
            'activityDays' => $activityDays,
            'exercises' => UserResultSave::activityDays($date)->with('exercise')->get(),
            'workoutPlanCategories' => $workoutPlanCategories,
        ];
    }


    public static function copyStandartProgramToMe(int $plan)
    {
        $user = auth()->user();
        if (!count(ProgramWeek::where('program_week_id', $plan)->get())) {
            abort(404);
        }
        $name = ProgramWeek::weekLang($plan)->value('name');
        if ($user->userProgramWeeks()->whereName($name)->pluck('name')->isNotEmpty()) {
            return redirect()->back();
        }
        $programCategId = $user->userProgramWeeks()->pluck('program_week_id')->isEmpty() ? 2000 : ($user->userProgramWeeks()->pluck('program_week_id')->max()) + 1;
        UserProgramWeek::create(
            [
                'user_id' => $user->id,
                'trainer_id' => $user->isTrainer() ? $user->id : 0,
                'program_week_id' => $programCategId,
                'workout_plan_week_id' => $plan,
                'name' => ProgramWeek::weekLang($plan)->value('name'),
                'description' => ProgramWeek::weekLang($plan)->value('description')
            ]
        );

        $lang = session('lang_id', 'rus');
        $unit2 = $user->km()->value('name');
        $weight2 = $user->weight()->value('name');
        $min = __('gym.resultadd_min');
        $repet = __('gym.resultadd_numb');
        foreach (Program::where('program_week_id', $plan)->whereLang($lang)->pluck('program_id') as $program) {
            $userProgramId = $user->userPrograms()->pluck('user_program_id')->isEmpty() ? 1000 : ($user->userPrograms()->pluck('user_program_id')->max()) + 1;
            $trainerId = $user->isTrainer() ? $user->id : 0;
            $k = 0;
            UserProgram::create(
                [
                    'user_id' => $user->id,
                    'user_program_id' => $userProgramId,
                    'program_week_id' => $programCategId,
                    'name' => Program::weekLang($plan)->where('program_id', $program)->value('name'),
                    'description' => Program::weekLang($plan)->where('program_id', $program)->value('description'),
                ]
            );

            foreach (Training::where('program_id', $program)->whereLang($lang)->pluck('exercise_id') as $exercise) {
                $repmin = Exercise::where('exercise_id', $exercise)->value('use_weight');
                $repmin1 = ($repmin != 2 && $repmin != 3) ? $repet : $min;
                $kmkg = Exercise::where('exercise_id', $exercise)->value('use_weight');
                $kmkg2 = ($kmkg != 2 && $kmkg != 3) ? $weight2 : $unit2;
                $trainerId = ($user->isTrainer()) ? $user->id : 0;
                UserTraining::create(
                    [
                        'user_id' => $user->id,
                        'user_program_id' => $userProgramId,
                        'program_week_id' => $programCategId,
                        'exercise_id' => $exercise,
                        'exercise' => Training::programLang($program)->where('exercise_id', $exercise)->value('description'),
                        'repmin' => $repmin1,
                        'kgkm' => $kmkg2,
                    ]
                );
                $k++;
            }
        }
    }

    public static function copyTrainerProgramToStudent(int $id, int $program)
    {
        $user = auth()->user();
        $programCategTrainer = $user->userProgramWeeks->where('program_week_id', $program)->first();
        $validator = \Validator::make(
            $programCategTrainer->toArray(),
            [
                'name' => [
                    Rule::unique('user_program_weeks', 'name')->where(
                        function ($query) use ($id) {
                            $query->where('user_id', $id);
                        }
                    ),
                ],
            ]
        );
        if ($validator->fails()) {
            return redirect()->back();
        }
        $programCategId = (UserProgramWeek::where('user_id', $id)->pluck('program_week_id')->isEmpty()) ? 2000 : (UserProgramWeek::where('user_id', $id)->pluck('program_week_id')->max()) + 1;
        $programsCategUser = $programCategTrainer->replicate();
        $programsCategUser->user_id = $id;
        $programsCategUser->program_week_id = $programCategId;
        $programsCategUser->save();
        $programsTrainer = $user->userPrograms->where('program_week_id', $program);
        foreach ($programsTrainer as $programTrainer) {
            $userProgramId = (UserProgram::where('user_id', $id)->pluck('user_program_id')->isEmpty()) ? 1000 : (UserProgram::where('user_id', $id)->pluck('user_program_id')->max()) + 1;
            $trainingsTrainer = auth()->user()->userTrainings
                ->where('program_week_id', $program)->where('user_program_id', $programTrainer->user_program_id);
            foreach ($trainingsTrainer as $trainingTrainer) {
                $trainingUser = $trainingTrainer->replicate();
                $trainingUser->user_id = $id;
                $trainingUser->user_program_id = $userProgramId;
                $trainingUser->program_week_id = $programCategId;
                $trainingUser->save();
            }
            $programUser = $programTrainer->replicate();
            $programUser->user_id = $id;
            $programUser->user_program_id = $userProgramId;
            $programUser->program_week_id = $programCategId;
            $programUser->save();
        }
    }

    public static function createPageExercise($exercise)
    {
        $eqipa = null;
        $muscleFirst = Exercise::where('exercise_id', $exercise)->value('muscle_first');
        $muscleSecond = Exercise::where('exercise_id', $exercise)->value('muscle_second');
        $difficulty = Exercise::where('exercise_id', $exercise)->value('difficulty');
        $equipment = Exercise::where('exercise_id', $exercise)->value('equipment');
        if (($muscleFirst != 0) && (strlen($muscleFirst) == 1)) {
            $muscleFirst = Muscles::langBy('code', $muscleFirst)->value('name');
            $eqipa = $eqipa . '<strong>' . __('gym.muscle_first') . '</strong>' . $muscleFirst . '<br>';
        }
        if (($muscleFirst != 0) && (strlen($muscleFirst) != 1)) {
            $muscle = null;
            foreach ((explode(';', $muscleFirst)) as $muscleFirst) {
                $muscle = $muscle . ',' . (Muscles::langBy('code', $muscleFirst)->value('name'));
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
            foreach ((explode(';', $muscleSecond)) as $muscleSecond) {
                $muscle = $muscle . ',' . (Muscles::langBy('code', $muscleSecond)->value('name'));
            }
            $muscleSecond = substr($muscle, 1);
            $eqipa = $eqipa . '<strong>' . __('gym.muscle_second') . '</strong>' . $muscleSecond . '<br>';
        }
        $difficulty = Difficulty::langBy('code', $difficulty)->value('name');
        $eqipa = $eqipa . '<strong>' . __('gym.difficulty_level') . '</strong>' . $difficulty . '<br>';
        $equipment = DescEquipment::langBy('code', $equipment)->value('name');
        $page = [
            'exercise' => ExerciseText::langBy('exercise_id', $exercise)->value('name'),
            'image' => '/image/exercises/desc_' . $exercise . '.gif',
            'exercise_text' => ExerciseText::exerciseLang($exercise)->value('text'),
            'eqipa' => $eqipa . '<strong>' . __('gym.equipment_level') . '</strong>' . $equipment . '<br>',
        ];
        return $page;
    }

    public static function deleteUserProgramWeek(int $program)
    {
        $user = auth()->user();
        $user->userProgramWeeksByWeek($program)->delete();
        $user->userProgramsByWeek($program)->delete();
        $user->userTrainingByWeek($program)->delete();
    }
}
