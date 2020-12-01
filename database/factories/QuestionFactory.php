<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [

        #---- el ".": elimina el punto q se le da a la frase creada.
        'title' => rtrim($faker->sentence(rand(5, 10)), "."),
        #---- el 3, significa el 3 saltos de linea
        'body' => $faker->paragraphs(rand(3, 7), true),
        'views' => rand(0, 10),
//        'answers_count' => rand(0, 10),
//        'votes_count' => rand(-3, 10)


    ];
});
