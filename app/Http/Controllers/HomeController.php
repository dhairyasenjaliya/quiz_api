<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 
use App\User;
use App\Question;
use App\Categorie;   
use App\QuizUser;
use App\LeaderBoards;
use Illuminate\Support\Facades\Auth;
use DB; 
 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        $categories = DB::select('select * from categories ORDER BY ID DESC'); 
        // $Categories = Categorie::find(14)->Question;  
        // dd($Categories);
        return view('category',['categories'=>$categories]) ;
    }   
 
    public function showquestion()
    {          
        $questions = Question::with('Categorie')->latest()->get(); 
        $cate = Categorie::all();  
        return view('question',['questions'=>$questions],['cate'=>$cate]) ;
    } 

    public function quizuser()
    {         
        $quiz_user = QuizUser::all();        
        return view('quizuser',['quiz_user'=>$quiz_user]) ;
    }
 
    public function leadersboard()
    {
        $quiz_user = LeaderBoards::with('QuizUser')->with('Categorie')->get();   
        return view('leadersboard',['quiz_user'=>$quiz_user]) ;  
    } 
}
