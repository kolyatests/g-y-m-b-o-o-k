 <?php

use Faker\Generator as Faker;

$factory->define(\App\Models\User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');

    return [
            'name' => $faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$.PLT0/FpPRTDX3TPhtnGjegGsN5fLpqTjtKVnAgfvuWlAVTevW41C',
            'gender' => $this->faker->randomElement(['f', 'm']),
            'location' => $faker->country,
            'first_name' => $faker->firstName('male' | 'female'),
            'last_name' => $faker->lastName,
            'verify' => 88,
            'role' => 0,
        ];
});
