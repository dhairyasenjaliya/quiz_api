<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Categorie;
use App\Question;
use DB;
use Response;

class APICategoryController extends Controller
{
     
    public function category_image()
    {      
        $qry = Categorie::all('image');  
        return response()->json($qry);
    }

    public function getCategory()
    {      
        $qry = Categorie::get();  
        return response()->json($qry);
    }
 
}
