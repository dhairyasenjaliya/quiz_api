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
Route::get('getscore','APIUserController@getscore');  
Route::get('getusers','APIUserController@getusers'); 

 
// DailyChallenges

Route::get('DailyChallenges','APIDailyChallenges@DailyChallenges');

// Image

Route::get('category_image','APICategoryController@category_image');

Route::get('getcategory','APICategoryController@getCategory');