<?php

use Faker\Generator as Faker;

$factory->define(App\Tema::class, function (Faker $faker) {

    $nombre = $faker->paragraph(1);
    return [
        'nombre' => $nombre,
        'descripcion' => $faker->paragraph,
        'user_id' => \App\User::all()->random()->id,
        'url' => str_slug($nombre,'-')
    ];
});
