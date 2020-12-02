<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    #--- by using this all methods that defines on VotableTrait  will be available here
    use VotableTrait;

    protected $fillable = ['body', 'user_id'];

   
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return clean(\Parsedown::instance()->text($this->body));
    }

    public static function boot()
    {
        parent::boot();
        #--- Every time when an answers is created...
        #----execute this code
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });
        
        #--- when a new answer is deleted the counter will be decrement
        static::deleted(function ($answer) {
            $answer->question->decrement('answers_count');
        });

    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    #---------------- for best answer opens ----------------
    public function getStatusAttribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }
    public function getIsBestAttribute()
    {
        return $this->isBest();
    }
    public function isBest()
    {
        return $this->id === $this->question->best_answer_id;
    }
    #---------------- for best answer closes ----------------


}
