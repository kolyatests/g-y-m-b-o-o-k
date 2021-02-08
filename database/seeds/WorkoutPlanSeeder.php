<?php

use Illuminate\Database\Seeder;

class WorkoutPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[


            ['workout_plan_id' => '101','workout_plan_week_id' => '1','img' => 'workout_plan_101','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '2','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '102','workout_plan_week_id' => '2','img' => 'workout_plan_102','gender' => '2','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '2','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '103','workout_plan_week_id' => '1','img' => 'workout_plan_103','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '104','workout_plan_week_id' => '2','img' => 'workout_plan_104','gender' => '2','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '2','purpose' => '4','equipment' => '1;2','month' => '2'],
            ['workout_plan_id' => '105','workout_plan_week_id' => '1','img' => 'workout_plan_105','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '106','workout_plan_week_id' => '2','img' => 'workout_plan_106','gender' => '2','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '107','workout_plan_week_id' => '3','img' => 'workout_plan_107','gender' => '3','place' => '2','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '9','equipment' => '2','month' => '0'],
            ['workout_plan_id' => '108','workout_plan_week_id' => '1','img' => 'workout_plan_108','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '2','purpose' => '3','equipment' => '1;2;3;4','month' => '2'],
            ['workout_plan_id' => '109','workout_plan_week_id' => '3','img' => 'workout_plan_109','gender' => '3','place' => '2','specific' => '0','difficulty' => '1','workout_week' => '2','purpose' => '9','equipment' => '2','month' => '2'],
            ['workout_plan_id' => '110','workout_plan_week_id' => '1','img' => 'workout_plan_110','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '111','workout_plan_week_id' => '1','img' => 'workout_plan_111','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3;4','month' => '2'],
            ['workout_plan_id' => '113','workout_plan_week_id' => '1','img' => 'workout_plan_113','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '4','purpose' => '3','equipment' => '1;2;3;4','month' => '2'],
            ['workout_plan_id' => '114','workout_plan_week_id' => '1','img' => 'workout_plan_114','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '2','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '115','workout_plan_week_id' => '1','img' => 'workout_plan_115','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '4','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '116','workout_plan_week_id' => '2','img' => 'workout_plan_116','gender' => '2','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '2','purpose' => '2','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '117','workout_plan_week_id' => '2','img' => 'workout_plan_117','gender' => '2','place' => '2','specific' => '9','difficulty' => '2','workout_week' => '3','purpose' => '1','equipment' => '2;7','month' => '2'],
            ['workout_plan_id' => '119','workout_plan_week_id' => '1','img' => 'workout_plan_119','gender' => '1','place' => '2','specific' => '9','difficulty' => '2','workout_week' => '3','purpose' => '1','equipment' => '2;7','month' => '2'],
            ['workout_plan_id' => '120','workout_plan_week_id' => '1','img' => 'workout_plan_120','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '2','purpose' => '2','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '125','workout_plan_week_id' => '1','img' => 'workout_plan_125','gender' => '1','place' => '2','specific' => '9','difficulty' => '1','workout_week' => '3','purpose' => '3','equipment' => '2','month' => '2'],
            ['workout_plan_id' => '126','workout_plan_week_id' => '1','img' => 'workout_plan_126','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '5','purpose' => '3','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '127','workout_plan_week_id' => '1','img' => 'workout_plan_127','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3;4','month' => '2'],
            ['workout_plan_id' => '128','workout_plan_week_id' => '1','img' => 'workout_plan_128','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '129','workout_plan_week_id' => '2','img' => 'workout_plan_129','gender' => '2','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '2','purpose' => '1','equipment' => '1;2','month' => '2'],
            ['workout_plan_id' => '130','workout_plan_week_id' => '2','img' => 'workout_plan_130','gender' => '2','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '4','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '131','workout_plan_week_id' => '2','img' => 'workout_plan_131','gender' => '2','place' => '2','specific' => '9','difficulty' => '1','workout_week' => '3','purpose' => '3','equipment' => '2','month' => '2'],
            ['workout_plan_id' => '132','workout_plan_week_id' => '2','img' => 'workout_plan_132','gender' => '2','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '3','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '133','workout_plan_week_id' => '3','img' => 'workout_plan_133','gender' => '3','place' => '2','specific' => '0','difficulty' => '1','workout_week' => '2','purpose' => '9','equipment' => '2','month' => '0'],
            ['workout_plan_id' => '135','workout_plan_week_id' => '2','img' => 'workout_plan_135','gender' => '2','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '136','workout_plan_week_id' => '1','img' => 'workout_plan_136','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '2','purpose' => '2','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '138','workout_plan_week_id' => '1','img' => 'workout_plan_138','gender' => '1','place' => '1','specific' => '6','difficulty' => '3','workout_week' => '3','purpose' => '6','equipment' => '1;2;3;4','month' => '2'],
            ['workout_plan_id' => '139','workout_plan_week_id' => '1','img' => 'workout_plan_139','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '4','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '140','workout_plan_week_id' => '1','img' => 'workout_plan_140','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '7','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '141','workout_plan_week_id' => '1','img' => 'workout_plan_141','gender' => '1','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '4','purpose' => '7','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '142','workout_plan_week_id' => '1','img' => 'workout_plan_142','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '7','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '143','workout_plan_week_id' => '1','img' => 'workout_plan_143','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '7','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '144','workout_plan_week_id' => '1','img' => 'workout_plan_144','gender' => '1','place' => '2','specific' => '10','difficulty' => '2','workout_week' => '3','purpose' => '3','equipment' => '2;3','month' => '2'],
            ['workout_plan_id' => '145','workout_plan_week_id' => '1','img' => 'workout_plan_145','gender' => '1','place' => '2','specific' => '12','difficulty' => '1','workout_week' => '3','purpose' => '3','equipment' => '4;5','month' => '2'],
            ['workout_plan_id' => '147','workout_plan_week_id' => '2','img' => 'workout_plan_147','gender' => '2','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '3','purpose' => '6','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '148','workout_plan_week_id' => '2','img' => 'workout_plan_148','gender' => '2','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '3','purpose' => '6','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '149','workout_plan_week_id' => '2','img' => 'workout_plan_149','gender' => '2','place' => '2','specific' => '0','difficulty' => '2','workout_week' => '2','purpose' => '4','equipment' => '2','month' => '2'],
            ['workout_plan_id' => '151','workout_plan_week_id' => '3','img' => 'workout_plan_151','gender' => '3','place' => '2','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '9','equipment' => '0','month' => '0'],
            ['workout_plan_id' => '154','workout_plan_week_id' => '1','img' => 'workout_plan_154','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '3','equipment' => '1;2;3;4','month' => '2'],
            ['workout_plan_id' => '160','workout_plan_week_id' => '1','img' => 'workout_plan_160','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '2','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '161','workout_plan_week_id' => '1','img' => 'workout_plan_161','gender' => '1','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '2','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '162','workout_plan_week_id' => '1','img' => 'workout_plan_162','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '3','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '163','workout_plan_week_id' => '1','img' => 'workout_plan_163','gender' => '1','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '3','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '164','workout_plan_week_id' => '1','img' => 'workout_plan_164','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '4','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '165','workout_plan_week_id' => '1','img' => 'workout_plan_165','gender' => '1','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '4','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '170','workout_plan_week_id' => '1','img' => 'workout_plan_170','gender' => '1','place' => '1','specific' => '6','difficulty' => '3','workout_week' => '2','purpose' => '6','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '171','workout_plan_week_id' => '1','img' => 'workout_plan_171','gender' => '1','place' => '1','specific' => '6','difficulty' => '3','workout_week' => '4','purpose' => '6','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '174','workout_plan_week_id' => '1','img' => 'workout_plan_174','gender' => '1','place' => '1','specific' => '6','difficulty' => '3','workout_week' => '5','purpose' => '6','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '176','workout_plan_week_id' => '3','img' => 'workout_plan_176','gender' => '3','place' => '2','specific' => '0','difficulty' => '2','workout_week' => '3','purpose' => '9','equipment' => '8','month' => '2'],
            ['workout_plan_id' => '189','workout_plan_week_id' => '1','img' => 'workout_plan_189','gender' => '1','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '5','purpose' => '7','equipment' => '1;2;3;4;5','month' => '2'],
            ['workout_plan_id' => '190','workout_plan_week_id' => '1','img' => 'workout_plan_190','gender' => '1','place' => '1','specific' => '0','difficulty' => '1','workout_week' => '5','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '191','workout_plan_week_id' => '1','img' => 'workout_plan_191','gender' => '1','place' => '1','specific' => '0','difficulty' => '2','workout_week' => '5','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '192','workout_plan_week_id' => '1','img' => 'workout_plan_192','gender' => '1','place' => '1','specific' => '0','difficulty' => '3','workout_week' => '5','purpose' => '1','equipment' => '1;2;3','month' => '2'],
            ['workout_plan_id' => '203','workout_plan_week_id' => '1','img' => 'workout_plan_203','gender' => '1','place' => '2','specific' => '9','difficulty' => '1','workout_week' => '3','purpose' => '1','equipment' => '2;7','month' => '2'],
            ['workout_plan_id' => '207','workout_plan_week_id' => '3','img' => 'workout_plan_207','gender' => '3','place' => '2','specific' => '14','difficulty' => '1','workout_week' => '3','purpose' => '1','equipment' => '0','month' => '2'],
            ['workout_plan_id' => '210','workout_plan_week_id' => '3','img' => 'workout_plan_210','gender' => '3','place' => '2','specific' => '13','difficulty' => '1','workout_week' => '3','purpose' => '1','equipment' => '7','month' => '2'],
            ['workout_plan_id' => '213','workout_plan_week_id' => '1','img' => 'workout_plan_213','gender' => '1','place' => '2','specific' => '11','difficulty' => '1','workout_week' => '3','purpose' => '3','equipment' => '4','month' => '2'],
            ['workout_plan_id' => '216','workout_plan_week_id' => '1','img' => 'workout_plan_216','gender' => '1','place' => '2','specific' => '9','difficulty' => '1','workout_week' => '5','purpose' => '1','equipment' => '2;7','month' => '2'],
            ['workout_plan_id' => '219','workout_plan_week_id' => '3','img' => 'workout_plan_219','gender' => '3','place' => '2','specific' => '14','difficulty' => '1','workout_week' => '5','purpose' => '1','equipment' => '0','month' => '2'],
            ['workout_plan_id' => '222','workout_plan_week_id' => '3','img' => 'workout_plan_222','gender' => '3','place' => '2','specific' => '13','difficulty' => '1','workout_week' => '5','purpose' => '1','equipment' => '7','month' => '2'],
            ['workout_plan_id' => '225','workout_plan_week_id' => '1','img' => 'workout_plan_225','gender' => '1','place' => '2','specific' => '9','difficulty' => '1','workout_week' => '5','purpose' => '3','equipment' => '2','month' => '2'],



        ];
        DB::table('workout_plans')->insert($data);
    }
}
