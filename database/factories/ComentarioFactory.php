<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->text,
        'fecha' => $faker->dateTime(),
        'articulo_id' => factory(App\Articulo::class),
        'user_id' => factory(App\User::class)
    ];
});
