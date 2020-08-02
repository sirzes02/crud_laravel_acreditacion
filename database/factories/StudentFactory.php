<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Student::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        "cedula" => $faker->ean13(),
        'email' => $faker->unique()->safeEmail,
        'contrasenia' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        "tipo" => $faker->word(),
        "programa" => $faker->sentence(3, true),
        "facultad" => $faker->sentence(3, true),
        "avatar" => $faker->numberBetween(0, 12),
        "semana" => null,
        "resueltas" => null,
        "puntaje" => $faker->numberBetween(0, 1000),
    ];
});
