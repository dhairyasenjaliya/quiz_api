<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizUser extends Model
{
    protected $table = 'quizusers';
    protected $fillable = [
        'username'  
    ];

    public function LeaderBoards()
    {
        return $this->hasMany(LeaderBoards::class);
    }
}
