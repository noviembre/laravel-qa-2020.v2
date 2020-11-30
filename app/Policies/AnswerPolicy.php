<?php

namespace App\Policies;

use App\User;
use App\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    #--- this steps are just for this file and
    #--- 1. php artisan make:policy AnswerPolicy --model=Answer
    #--- 2. fill update and delete methods
    #--- 3. register in AuthServiceProvider
    
    /**
     * Determine whether the user can update the answer.
     *
     * @param  \App\User  $user
     * @param  \App\Answer  $answer
     * @return mixed
     */
    public function update(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    #---- accept and answer as best answer, only the user who made this question can do this
    public function accept(User $user, Answer $answer)
    {
        return $user->id === $answer->question->user_id;
    }
    /**
     * Determine whether the user can delete the answer.
     *
     * @param  \App\User  $user
     * @param  \App\Answer  $answer
     * @return mixed
     */
    public function delete(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }


}
