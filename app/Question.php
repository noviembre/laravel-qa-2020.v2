<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    #--- by using this all methods that defines on VotableTrait  will be available here
    use VotableTrait;

    protected $fillable = ['title', 'body'];


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

    #---- cleaning the body column before save/update it in the db
    #----tutor comment below code.
//     public function setBodyAttribute($value)
//     {
//         $this->attributes['body'] = clean($value);
//     }

    #----- accessor $this->body
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
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

    #------- accessor for body colum - opens ------
    public function getExcerptAttribute()
    {
        return $this->excerpt(250);
    }
    public function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHtml()), $length);
    }
    private function bodyHtml()
    {
        return \Parsedown::instance()->text($this->body);
    }
    #------- accessor for body colum - closes ------


}
