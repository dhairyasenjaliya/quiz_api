<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'categories', 'question','answer','image'
    ];
    public function Categorie()
    {
        return $this->belongsTo(Categorie::class,'categories');
    }
}
