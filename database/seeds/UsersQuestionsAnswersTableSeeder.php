<?php

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan make:seeder UsersQuestionsAnswersTableSeeder
     * @return void
     */
    public function run()
    {
        #----- delete records
        #---- we have to delete records in reverse order (followinf all code after factory(App\User::class, 3))
        #.... otherwise will fail
        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();

        #-----this is the natural order of the seeding
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
