<?php

namespace App\Policies;

use App\User;
use App\question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function update(User $user, question $question)
    {
        return $user->id === $question->user_id;
    }

    /**
     * Determine whether the user can delete the question.
     *
     * @param  \App\User  $user
     * @param  \App\question  $question
     * @return mixed
     */
    public function delete(User $user, question $question)
    {
        #----- the question that has 1 or more answers cant not be removed even by the creator
        #---- if the current user is he creator of the question, and the question that will be removed
        #---- has no answer then the creator of the answer will be authorize to remove

        return $user->id === $question->user_id && $question->answers < 1;
    }
}
