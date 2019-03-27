<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Categorie;
use App\Question;
use DB;
use Response;

class APIDailyChallenges extends Controller
{
    public function DailyChallenges()
    {      
        $cate = Categorie::inRandomOrder()->select('id')->where('isDaily',true)->get() ;
        $qry = Question::orderByRaw("RAND() * 99999")->select('question','answer','image')->where('categories',$cate->toArray())->first();  
        return response()->json($qry);  
        // SELECT FLOOR(RAND() * 99999) AS random_num
        // FROM numbers_mst 
        // WHERE "random_num" NOT IN (SELECT my_number FROM numbers_mst)
        // LIMIT 1 
    }
}
