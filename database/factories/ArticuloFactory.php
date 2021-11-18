<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use Faker\Generator as Faker;

$factory->define(Articulo::class, function (Faker $faker) {
    return [
        'titulo' => $faker->text,
        'descripcion' => $faker->paragraph,
        'fecha' => $faker->dateTime(),
        'user_id' => factory(App\User::class)
    ];
});
