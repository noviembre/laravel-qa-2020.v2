<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan make:seeder FavoritesTableSeeder
     * @return void
     */
    public function run()
    {
        #---- first delete the favorites table
        \DB::table('favorites')->delete();
        #---- we do this to make sure we dont have duplicate users
        $users = \App\User::pluck('id')->all();
        $numberOfUsers = count($users);
        #--- iterate all questions
        foreach (\App\Question::all() as $question)
        {
            #----we make every single question to be favorited by at least one user
            for ($i = 0; $i < rand(1, $numberOfUsers); $i++)
            {
                #-- getting random users
                $user = $users[$i];
                #--- attach the current question to the ramdon users
                $question->favorites()->attach($user);
            }
        }
    }
}
