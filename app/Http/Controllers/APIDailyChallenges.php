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
        $cate = Categorie::select('id')->where('isDaily',true)->get();          
        $qry = Question::select('id','question','answer')->wherein('categories', $cate)->get(); //->where('categories',$cate->toArray())->get();  

        return response()->json($qry);

        //  $cate = Categorie::select('id')->where('isDaily',true)->get() ;
        //  $qry = Question::select('id','question','answer','image')->where('categories',$cate->toArray())->get();  

        // return response()->json($qry);
        
        // $cate = Categorie::select('id')->where('isDaily',true)->get() ;
        // $qry = Question::orderByRaw("RAND() * 99999")->select('question','answer','image')->where('categories',$cate->toArray())->get();  

        // SELECT FLOOR(RAND() * 99999) AS random_num
        // FROM numbers_mst 
        // WHERE "random_num" NOT IN (SELECT my_number FROM numbers_mst)
        // LIMIT 1 
    }
}
