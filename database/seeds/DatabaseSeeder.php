<?php

use App\Models\User;
use App\Models\Book\BookTag;
use App\Models\Book\BookPost;
use App\Models\Book\BookWall;
use Illuminate\Database\Seeder;
use App\Models\Book\BookComment;
use App\Models\Book\BookCategory;
use App\Models\Sport\WorkoutPlan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DescDifficultySeeder::class);
        $this->call(DescEquipmentSeeder::class);
        $this->call(ExerciseSeeder::class);
        $this->call(ExerciseTextSeeder::class);
        $this->call(DifficultySeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(KmSeeder::class);
        $this->call(LangSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuTextSeeder::class);
        $this->call(MonthSeeder::class);
        $this->call(MusclesSeeder::class);
        $this->call(PlacesSeeder::class);
        $this->call(ProgramWeekSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(PurposeSeeder::class);
        $this->call(SpecificSeeder::class);
        $this->call(StringSeeder::class);
        $this->call(TrainingSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(WeightSeeder::class);

        $this->call(WorkoutPlanSeeder::class);
        $this->call(WorkoutPlanTextSeeder::class);
        $this->call(WorkoutPlanWeekSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(UserTrainersTableSeeder::class);
        $this->call(UserFavoriteSeeder::class);
        $this->call(UserGrafikExercisesTableSeeder::class);
        $this->call(UserProgramsTableSeeder::class);
        $this->call(UserResultSavesTableSeeder::class);
        $this->call(UserResultsTableSeeder::class);

        $this->call(UserGrafikExercisesTableSeeder::class);
        $this->call(UserResultsTableSeeder::class);
        $this->call(UserResultSavesTableSeeder::class);
        $this->call(UserActivityDaysTableSeeder::class);


        $this->call(UserTrainingsTableSeeder::class);
        $this->call(UserShopProgramsTableSeeder::class);
        $this->call(UserProgramWeeksTableSeeder::class);





    }
}
