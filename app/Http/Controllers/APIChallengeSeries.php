<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Categorie;
use App\Question;
use DB;
use Response;

class APIChallengeSeries extends Controller
{
    public function ChallengeSeries(Request $request)
    {      
        $validator = Validator::make($request->all(), [
            'search' => 'required', 
        ]);
 
        if($validator->fails()) {
            return response()->json([ 'error'=> $validator->messages()], 401);
        }

        $search = $request->get('search'); 
 
        $cat = Categorie::select('id')->where('title',$search)->get();  
        
        $qry = Question::select('id','question','answer','image')->where('categories',$cat->toArray())->get();
       
        if($qry == '[]'){  
            return response()->json('No Category Select !!');  
        }
        else{
            return response()->json($qry);
         }    
    }

}
