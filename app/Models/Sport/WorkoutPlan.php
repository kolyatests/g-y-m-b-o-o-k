<?php

namespace App\Models\Sport;

class  WorkoutPlan extends BaseModel
{
    public function buyProgramText()
    {
        return $this->hasOne(WorkoutPlanText::class, 'workout_plan_id', 'workout_plan_id')->lang();
    }


    public function programWeek()
    {
        return $this->belongsTo(ProgramWeek::class, 'workout_plan_id', 'program_week_id');
    }

    public function getGender()
    {
        return $this->hasOne(Genders::class, 'code', 'gender')->lang()->first()->name;
    }

    public function getPlace()
    {
        return $this->hasOne(Places::class, 'code', 'place')->lang()->first()->name;
    }

    public function getDifficulty()
    {
        return $this->hasOne(Difficulty::class, 'code', 'difficulty')->lang()->first()->name;
    }

    public function getSpecific()
    {
        return $this->hasOne(Specific::class, 'code', 'specific')->lang()->first()->name;
    }

    public function getPurpose()
    {
        return $this->hasOne(Purpose::class, 'code', 'purpose')->lang()->first()->name;
    }

    public function getEquipments()
    {
        $equipmentTemp = '';
        foreach ((explode(';', $this->equipment)) as $equipment) {
            $equipmentTemp = $equipmentTemp . ',' . ($this->getEquipment($equipment));
        }

        return (__('gym.need') . ':' . substr($equipmentTemp, 1));
    }

    public function getEquipment($equipment)
    {
        return Equipment::langBy('code', $equipment)->value('name');
    }

    public function getMonth()
    {
        $month1 = $this->month;
        $description = WorkoutPlanText::where('workout_plan_id', $this->workout_plan_id)->lang()->value('description');
        if ($month1 == 2) {
            return $description . '<br><hr>' . str_replace('#VALUE#', '1-2', __('gym.workout_duraction'));
        } elseif ($month1 == 3) {
            return $description . '<br><hr>' . str_replace('#VALUE#', '2-3', __('gym.workout_duraction'));
        } else {
            return $description;
        }
    }

    public function selectByParameters($request)
    {
        $listsAll = null;
        $allPrograms = $this->all();

        if ($request->alltrains[0] > 0) {
            $allPrograms = $allPrograms->where('gender', $request->alltrains[0]);
        }
        if ($request->alltrains[1] > 0) {
            $allPrograms = $allPrograms->where('place', $request->alltrains[1]);
        }
        if ($request->alltrains[2] > 0) {
            $allPrograms = $allPrograms->where('specific', $request->alltrains[2]);
        }
        if ($request->alltrains[3] > 0) {
            $allPrograms = $allPrograms->where('difficulty', $request->alltrains[3]);
        }
        if ($request->alltrains[4] > 0) {
            $allPrograms = $allPrograms->where('purpose', $request->alltrains[4]);
        }
        if ($request->alltrains[5] > 0) {
            $allPrograms = $allPrograms->where('workout_week', $request->alltrains[5]);
        }

        if ($request->alltrains[0] == 999999) {//my train
            $myPrograms = auth()->user()->userProgramWeeks()->get();
            $listsAll = null;
            foreach ($myPrograms as $list) {
                $listsAll = $listsAll . '<a class="btn btn-outline-secondary card-body btn-lg btn-block" href="'
                    . route(
                        'sport.program.description',
                        $list->program_week_id
                    ) . '"><h4>' . $list->name . '</h4></a></div>';
            }
        }
        if ($allPrograms) {
            $array = $allPrograms->pluck('workout_plan_id')->toArray();
            $lists = WorkoutPlanText::Lang()->whereIn('workout_plan_id', $array)->get();
            foreach ($lists as $list) {
                $listsAll = $listsAll . '<a class="btn btn-outline-secondary card-body btn-lg btn-block" href="' . route(
                        'sport.program.description',
                        $list->workout_plan_id
                    ) . '"><h4>' . $list->name . '</h4></a></div>';
            }
        }
        return $listsAll;
    }

    public function selectByParametersWithPhoto($request)
    {
        $listsAll = null;
        $allPrograms = $this->all();

        if ($request->alltrains2[0] > 0) {
            $allPrograms = $allPrograms->where('gender', $request->alltrains2[0]);
        }
        if ($request->alltrains2[1] > 0) {
            $allPrograms = $allPrograms->where('place', $request->alltrains2[1]);
        }
        if ($request->alltrains2[2] > 0) {
            $allPrograms = $allPrograms->where('specific', $request->alltrains2[2]);
        }
        if ($request->alltrains2[3] > 0) {
            $allPrograms = $allPrograms->where('difficulty', $request->alltrains2[3]);
        }
        if ($request->alltrains2[4] > 0) {
            $allPrograms = $allPrograms->where('purpose', $request->alltrains2[4]);
        }
        if ($request->alltrains2[5] > 0) {
            $allPrograms = $allPrograms->where('workout_week', $request->alltrains2[5]);
        }
        if ($request->alltrains2[0] == 999999) {
            $myPrograms = auth()->user()->userProgramWeeks()->get();
            $listsAll = null;
            foreach ($myPrograms as $list) {
                $listsAll = $listsAll . '<a class="btn btn-outline-secondary card-body btn-lg btn-block" href="' . route(
                        'sport.program.description',
                        $list->program_week_id
                    ) . '"><h4>' . $list->name . '</h4></a></div>';
            }
        }

        if ($allPrograms) {
            $array = $allPrograms->pluck('workout_plan_id')->toArray();
            $lists = WorkoutPlanText::Lang()->whereIn('workout_plan_id', $array)->get();
            foreach ($lists as $list) {
                $listsAll = $listsAll . '
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-uppercase text-center">' . $list->name . '</h4>
                        </div>
                        <div class="card-body text-center">
                            <a href="' . route('sport.program.description', $list->workout_plan_id) . '">
                        <img class="img-thumbnail" src="../storage/image/workout_plan/workout_plan_' . $list->workout_plan_id . '.jpg"  alt="">
                            </a>
                        </div>
                    </div>';
            }
        }

        return $listsAll;
    }

    public function findAllTrain($plans)
    {
        $program = str_replace('programa', '', $plans);
        $ident = str_split($program);
        $lenth = strlen($program);
        if ($lenth == 14 && $ident[0] == 'g' && $ident[3] == 'p' && $ident[6] == 'm' && $ident[9] == 's' && $ident[12] == 'd') {
            $pages = $this->whereGender($ident[1])
                ->wherePlace($ident[4])
                ->wherePurpose($ident[7])
                ->whereSpecific($ident[10])
                ->whereDifficulty($ident[13])->get();
        } elseif ($lenth == 11 && $ident[0] == 'g' && $ident[3] == 'p' && $ident[6] == 'm' && $ident[9] == 'd') {
            $pages = $this->whereGender($ident[1])
                ->wherePlace($ident[4])
                ->wherePurpose($ident[7])
                ->whereDifficulty($ident[10])->get();
        } elseif ($lenth == 8 && $ident[0] == 'g' && $ident[3] == 'p' && $ident[6] == 'm') {
            $pages = $this->whereGender($ident[1])
                ->wherePlace($ident[4])
                ->wherePurpose($ident[7])->get();
        } elseif ($lenth == 11 && $ident[0] == 'g' && $ident[3] == 'p' && $ident[6] == 'm' && $ident[9] == 's') {
            $pages = $this->whereGender($ident[1])
                ->wherePlace($ident[4])
                ->wherePurpose($ident[7])
                ->whereSpecific($ident[10])->get();
        } elseif ($lenth == 15 && $ident[0] == 'g' && $ident[3] == 'p' && $ident[6] == 'm' && $ident[9] == 's' && $ident[13] == 'd') {
            $pages = $this->
            wherePlace($ident[4])
                ->wherePurpose($ident[7])
                ->whereSpecific(($ident[10] . $ident[11]))
                ->whereDifficulty($ident[14])->get();
        } elseif ($lenth == 12 && $ident[0] == 'g' && $ident[3] == 'p' && $ident[6] == 'm' && $ident[9] == 's') {
            $pages = $this->whereGender($ident[1])
                ->wherePlace($ident[4])
                ->wherePurpose($ident[7])
                ->whereSpecific(($ident[10] . $ident[11]))->get();
        } elseif ($lenth == 5 && $ident[0] == 'p' && $ident[3] == 'm') {
            $pages = $this->wherePlace($ident[1])
                ->wherePurpose($ident[4])->get();
        } else {
            abort(404);
        }
        if (!$pages) {
            abort(404);
        }
        return $pages;
    }


}
