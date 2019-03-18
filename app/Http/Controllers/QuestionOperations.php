<?php

namespace App\Http\Controllers;
use App\Question;
use App\Categorie;
use DB;
use Illuminate\Http\Request;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use LaravelFCM\Message\Topics;

class QuestionOperations extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::select('select * from questions');
        return view('question',['questions'=>$questions]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request)
    {
        $request->validate([
            'categories'=>'required',
            'question'=> 'required',
            'answer'=>'required' 
          ]);
          $Question = new Question([
            'categories' => $request->get('categories'),
            'question'=> $request->get('question'),
            'answer'=>$request->get('answer') 
          ]);
          $Question->save();   
          
          // $notificationBuilder = new PayloadNotificationBuilder('New Fact');
          // $notificationBuilder->setBody($request->description)
          //             ->setSound('default');
          
          // $notification = $notificationBuilder->build();
          
          // $topic = new Topics();
          // $topic->topic('fact');
          
          // $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
          
          // $topicResponse->isSuccess();
          // $topicResponse->shouldRetry();
          // $topicResponse->error();
 
          return redirect('/question')->with('success', 'Question Added!!');
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $questions = Question::with('Categorie')->find($id);
        $cate = Categorie::all();
        // $facts = DB::table('facts')->where('id', '=', $id)->get();
        return view('/questionedit', compact('questions','cate'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'categories'=>'required',
          'question'=> 'required',
          'answer'=>'required' 
        ]);
    
          $questions = Question::find($id);
          $questions->categories = $request->get('categories'); 
          $questions->question = $request->get('question'); 
          $questions->answer = $request->get('answer'); 
          $questions->save();
    
          return redirect('/question')->with('success', 'Question has been updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Question::find($id);
        $questions->delete();
        return redirect('/question')->with('success', 'Question Deleted Success!!');
    }
 }
