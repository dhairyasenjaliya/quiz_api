<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaderBoards extends Model
{
    protected $table = 'leaderboards';
    
    protected $fillable = [
        'category_id' ,
        'user_id' ,
        'time',
        'total'
    ];

    // public function Question()
    // {
    //     return $this->hasMany(Question::class);
    // }

    public function QuizUser()
    {
        return $this->belongsTo(QuizUser::class);
    }

}
