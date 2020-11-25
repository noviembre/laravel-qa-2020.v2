<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #----creating random user (3)
        #----creating for every user (1,5) questions
        #----creating for every questions (1,5) answers
        factory(App\User::class, 3)->create()->each(function($u) {
            $u->questions()
                ->saveMany(
                    factory(App\Question::class, rand(1, 5))->make()
                )
                ->each(function ($q) {
                    $q->answers()->saveMany(factory(App\Answer::class, rand(1, 5))->make());
                });
        });

    }
}
