<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Categorie;
use App\Question;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quizuser', 'HomeController@quizuser')->name('quizuser');

Route::get('/category', 'HomeController@show')->name('category');
 
Route::get('/edit', 'Operations@edit');

Route::resource('crud', 'Operations');

Route::any('/search',function(Request $request){
    $q = Input::get( 'q' ); 
    $categories = Categorie::where('title','LIKE','%'.$q.'%')->get();
    if(count($categories) > 0)
        return view('/category',['categories'=>$categories]) ;
    else{
        $category = Categorie::all();
        return view('/category',['categories'=>$categories]);
    }    
});


Route::any('/searchquestion',function(Request $request){
    $q = Input::get('q');      
    $questions = Question::where('question','LIKE','%'.$q.'%')->get();
    $cate = Categorie::all();     
    if(count($questions) > 0)
        return view('question',['questions'=>$questions],['cate'=>$cate]) ;
    else{
        $questions = Question::all();
        return view('question',['questions'=>$questions],['cate'=>$cate]);
    }    
});


Route::get('/question', 'HomeController@showquestion')->name('question');

Route::get('/questionedit', 'QuestionOperations@edit');

Route::resource('quest', 'QuestionOperations');



Route::get('/leadersboard', 'HomeController@leadersboard')->name('leadersboard');