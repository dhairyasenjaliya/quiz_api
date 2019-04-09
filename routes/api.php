<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', 'APIRegisterController@register');
// Route::post('login', 'APILoginController@login');
 

// ChallengeSeries

Route::get('ChallengeSeries','APIChallengeSeries@ChallengeSeries');

// User

Route::post('user','APIUserController@add'); 
Route::post('score','APIUserController@score'); 

 
// DailyChallenges

Route::get('DailyChallenges','APIDailyChallenges@DailyChallenges');

// Image

Route::get('category_image','APICategoryController@category_image');