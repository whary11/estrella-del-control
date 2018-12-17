<?php

use Faker\Generator as Faker;

$factory->define(App\Respuesta::class, function (Faker $faker) {
    return [
        'nombre' => $faker->paragraph(2),
        'tipo' => $faker->randomElement(['CORRECTA', 'INCORRECTA']),
        'user_id' => \App\User::all()->random()->id,
        'tema_id' => \App\Tema::all()->random()->id,
        'pregunta_id' => \App\Pregunta::all()->random()->id,
    ];
});
