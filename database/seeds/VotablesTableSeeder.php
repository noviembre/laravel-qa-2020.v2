<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;

class VotablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=VotablesTableSeeder
     * @return void
     * php artisan db:seed --class=VotablesTableSeeder
     */
    public function run()
    {
        #------ reset votables table, only for question
        \DB::table('votables')->where('votable_type', 'App\Question')->delete();
        #----get all users
        $users = User::all();
        #---- count number of users
        $numberOfUsers = $users->count();
        #--- varible for posible values
        $votes = [-1, 1];
        foreach (Question::all() as $question)
        {
            #------ for every user
            for ($i = 0; $i < rand(1, $numberOfUsers); $i++)
            {
                $user = $users[$i];
                #---- user voting randomly
                $user->voteQuestion($question, $votes[rand(0, 1)]);
            }
        }
    }
}
