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

Route::get('/','PersonController@add_person');
Route::post('/create','PersonController@adding');
Route::get('/allperson','PersonController@allperson');
Route::get('delete/{id}','PersonController@delete_person');
Route::get('edit/{id}','PersonController@edit_person');
Route::post('/addedit/{id}','PersonController@addedit_person');

Route::get('utkarsh/{utk}',function($utk){
	$data['utk']="utkarsh";
	return View::make('/author/index',$data);

});


Route::get('first',function(){
	return Redirect::to('second');
});

Route::get('second',function(){
	return Response::make('Hello world!', 200);
});

