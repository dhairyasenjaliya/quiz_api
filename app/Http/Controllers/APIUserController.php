<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizUser;
use App\LeaderBoards;
use Validator;

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
 
        $data = LeaderBoards::create([ 
            'category_id' => $request->get('category_id'),
            'user_id' => $request->get('user_id'),
            'time' => $request->get('time'),
            'total' => $request->get('total'), 
        ]);
        return response()->json($data);
    }

    public function getscore()
    {
        $data = LeaderBoards::all();
        return response()->json($data);
    }    
}