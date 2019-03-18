<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categorie;
use DB;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use LaravelFCM\Message\Topics;

class Operations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::select('select * from categories ORDER BY ID DESC');
        return view('addceleb',['categories'=>$categories]) ;
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
            'title'=>'required' 
          ]);
          $Categorie = new Categorie([
            'title' => $request->get('title') 
          ]);
          $Categorie->save();

        //   $notificationBuilder = new PayloadNotificationBuilder('New Category');
        //   $notificationBuilder->setBody($request->title)
        //               ->setSound('default');
          
        //   $notification = $notificationBuilder->build();
          
        //   $topic = new Topics();
        //   $topic->topic('celebrities');
          
        //   $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
          
        //   $topicResponse->isSuccess();
        //   $topicResponse->shouldRetry();
        //   $topicResponse->error();           

          return redirect('/category')->with('success', 'Category Added!!');
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
    public function edit($id)
    {
        $categories = Categorie::find($id);
        return view('/edit', compact('categories'));         
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
            'title'=>'required' 
          ]);
    
          $Categorie = Categorie::find($id);
          $Categorie->title = $request->get('title') ;
          $Categorie->save();
    
          return redirect('/category')->with('success', 'Category has been updated !!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Categorie = Categorie::find($id);
        $Categorie->delete();
        return redirect('/category')->with('success', 'Category Deleted Success!!');
    }
}