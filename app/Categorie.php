<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title' ,
        'image' ,
        'isDaily'
    ];
    public function Question()
    {
        return $this->hasMany(Question::class);
    }

    public function LeaderBoards()
    {
        return $this->hasMany(LeaderBoards::class);
    }
}
