<?php

use Faker\Generator as Faker;

$factory->define(App\Pregunta::class, function (Faker $faker) {
    
    return [
        'nombre' => $faker->paragraph(1),
        'descripcion' => $faker->paragraph(2),
        'user_id' => \App\User::all()->random()->id,
        'tema_id' => \App\Tema::all()->random()->id,
    ];
});
