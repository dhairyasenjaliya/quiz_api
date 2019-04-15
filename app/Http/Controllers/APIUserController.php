<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizUser;
use App\LeaderBoards;
use Validator;
use DB;

class APIUserController extends Controller
{
        public function add(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:quizusers' 
            ]);
        
            if($validator->fails()) {
                return response()->json([ 'error'=> $validator->messages()], 401);
            }
    
            $data = QuizUser::create([
                'username' => $request->get('username'), 
            ]);
            return response()->json($data);
        }
    
        public function getusers(){ 
            $user = QuizUser::get();
            return response()->json($user);
        }    

        public function leadersboard(Request $request){ 
            $validator = Validator::make($request->all(), [
                'category_id'  => 'required', 
            ]);
            if($validator->fails()) {
                return response()->json([ 'error'=> $validator->messages()], 401);
            }
            $user = LeaderBoards::where('category_id','=',$request->category_id)->orderBy('total', 'desc')->take(10)->get();
            return response()->json($user);
        }

        public function score(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'category_id'  => 'required',
                'user_id' => 'required',
                'time' => 'required',
                'total'  => 'required',
            ]);
        
            if($validator->fails()) {
                return response()->json([ 'error'=> $validator->messages()], 401);
            } 

            $result = LeaderBoards::orwhere('category_id','=',$request->category_id)->where('user_id','=',$request->user_id)->first();              
             
                if($result){ 
                    foreach($result as $totals){  
                        if($request->total > $result->total){
                            $result->total = $request->total ; 
                            $result->save();
                        } 
                    }     
                } 
                else {
                    $data = LeaderBoards::create([ 
                        'category_id' => $request->get('category_id'),
                        'user_id' => $request->get('user_id'),
                        'time' => $request->get('time'),
                        'total' => $request->get('total'), 
                    ]);
                    return response()->json($data);
            }  
        }

        public function getscore()
        {
            $data = LeaderBoards::all();
            return response()->json($data);
        } 
        
        
}