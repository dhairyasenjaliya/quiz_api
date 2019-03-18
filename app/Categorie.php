<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title' 
    ];
    public function Question()
    {
        return $this->hasMany(Question::class);
    }
}
