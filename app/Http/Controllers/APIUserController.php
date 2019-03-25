<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizUser;
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
         return response()->json($data->username);
    }
}