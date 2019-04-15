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
    
    public function QuizUser()
    {
        return $this->belongsTo(QuizUser::class,'user_id');
    }

    public function Categorie()
    {
        return $this->belongsTo(Categorie::class,'id');
    } 
}
