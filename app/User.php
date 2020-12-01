<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function voteQuestions()
    {
        return $this->morphedByMany(Question::class, 'votable');
    }

    public function voteAnswers()
    {
        return $this->morphedByMany(Answer::class, 'votable');
    }


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function favorites()
    {
        #----- 'favorites' = table name
        return $this->belongsToMany(Question::class, 'favorites')->withTimestamps(); //, 'author_id', 'question_id');
    }


    #---this avatar does not exists in our model but do in gravatar
    #--- page: https://en.gravatar.com/site/implement/images/php/
    public function getAvatarAttribute()
    {
        $email = $this->email;
        $size = 32;
        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
    }

    public function voteQuestion(Question $question, $vote)
    {
        $voteQuestions = $this->voteQuestions();
        #---if vote exists, show it
        if ($voteQuestions->where('votable_id', $question->id)->exists()) {
            $voteQuestions->updateExistingPivot($question, ['vote' => $vote]);
        }
        #---otherwise, save it
        else {
            $voteQuestions->attach($question, ['vote' => $vote]);
        }
        #--- load votes
        $question->load('votes');
        #--- count negative votes
        $downVotes = (int) $question->downVotes()->sum('vote');

        #--- count positive votes
        #--SUM() : only sums positives and negatives numbers
        $upVotes = (int) $question->upVotes()->wherePivot('vote', 1)->sum('vote');

        #--- sum both counters
        $question->votes_count = $upVotes + $downVotes;
        $question->save();
    }

    #------ count vote answers
    public function voteAnswer(Answer $answer, $vote)
    {
        $voteAnswers = $this->voteAnswers();

        if ($voteAnswers->where('votable_id', $answer->id)->exists()) {
            $voteAnswers->updateExistingPivot($answer, ['vote' => $vote]);
        }

        else {
            $voteAnswers->attach($answer, ['vote' => $vote]);
        }

        $answer->load('votes');
        $downVotes = (int) $answer->downVotes()->sum('vote');
        $upVotes = (int) $answer->upVotes()->sum('vote');

        $answer->votes_count = $upVotes + $downVotes;
        $answer->save();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
