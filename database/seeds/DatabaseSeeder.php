<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // $faker = Faker;
        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     factory(App\Tema::class, 150)->create()->each(function($tema, Faker $faker){
        //         $tema->user_id = $user->id;
        //         $tema->nombre = $faker->title();
        //         $tema->descripcion = $faker->paragraph(100);

        //     $tema->save();

        //     });
        // });


        factory(App\User::class, 50)->create();
        factory(App\Tema::class, 6)->create();
        factory(App\Pregunta::class, 200)->create();
        factory(App\Respuesta::class, 500)->create();

    }
}
