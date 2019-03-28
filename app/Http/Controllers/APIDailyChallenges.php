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
        $cate = Categorie::select('id')->where('isDaily',true)->get() ; 
        // dd($cate->toArray()); 
        // $qry = Question::all()->where('categories','=',$cate->toArray()); //->where('categories',$cate->toArray())->get();  
        $i; 
        $count = count($cate);
 
        for($i = 1; $i <= $count ;$i++)
        {
            $qry = Question::all()->where('categories',$i); //->where('categories',$cate->toArray())->get();  
            $data[$i] = $qry;  
        } 
        return response()->json($data);
        
        // $cate = Categorie::select('id')->where('isDaily',true)->get() ;
        // $qry = Question::orderByRaw("RAND() * 99999")->select('question','answer','image')->where('categories',$cate->toArray())->get();  

        // SELECT FLOOR(RAND() * 99999) AS random_num
        // FROM numbers_mst 
        // WHERE "random_num" NOT IN (SELECT my_number FROM numbers_mst)
        // LIMIT 1 
    }
}
