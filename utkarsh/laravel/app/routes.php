<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => "auth"), function() {
Route::get('/dashboard','PersonController@add_person');
Route::post('/create','PersonController@adding');
Route::get('/allperson','PersonController@allperson');
Route::get('/delete/{userid}','PersonController@delete_person');
Route::get('/edit/{userid}','PersonController@edit_person');
Route::post('/addedit/{userid}','PersonController@addedit_person');
Route::get('/logout','PersonController@logout');

});
Route::post('/authenticate','PersonController@authenticate_user');
 Route::get("/",function(){
 	 if(Auth::check()){
 	 	return Redirect::to("dashboard");
 	 }
 	 // return Hash::make('123');
 	 return View::make("login");
 });


//***************************************//
 Route::get('/form','FormController@add_details');
 Route::post('/add_details','FormController@adding_info');
 Route::get('/get/{id}','FormController@get_info');
