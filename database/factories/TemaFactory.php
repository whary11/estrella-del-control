<?php

use Faker\Generator as Faker;

$factory->define(App\Tema::class, function (Faker $faker) {


    return [
        'nombre' => $faker->randomElement(['Gestión Documental y Archivo', 'Respnsabilidad Social', 'Seguridad y Salud en el Trabajo', 'Gestión Ambiental', 'Gestión de Calidad', 'Control Interno', 'Seguridad de la Información']),
        'descripcion' => $faker->paragraph,
        'user_id' => \App\User::all()->random()->id,
    ];
});
