<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function votes()
    {
        return $this->morphToMany(User::class, 'votable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); //, 'question_id', 'user_id');
    }

    #================= Title Mutator
    #---for title slug
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show',$this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }


    #---- accessor for status color---------
    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    #----- accessor $this->body
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    #-- choose an answers as Best answer
    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    #---- this calls isFavorited()
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function upVotes()
    {
        return $this->votes()->wherePivot('vote', 1);
    }
    public function downVotes()
    {
        return $this->votes()->wherePivot('vote', -1);
    }


}
