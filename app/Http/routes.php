<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',  [ 'middleware'=>'web','uses'=>'HomeController@index']);
Route::get('/category/{id}', [ 'middleware'=>'web','uses'=>'CategoryController@index']);
Route::get('/article/{id}',[ 'middleware'=>'web','uses'=>'ArticleController@show']);
Route::get('/rules', function(){return view('rules');});

Route::get('/auth/google', 'Auth\AuthController@redirectToProvider');
Route::get('/callback/google', 'Auth\AuthController@handleProviderCallback');
Route::get('/auth/logout', 'Auth\AuthController@logout');

Route::post('/add_article', [ 'middleware'=>'web','uses'=>'ArticleController@store']);
Route::get('/editor/{article_id}', [ 'middleware'=>'web','uses'=>'ArticleController@edit']);
Route::get('/editor', [ 'middleware'=>'web','uses'=>'ArticleController@create']);
Route::POST('/update',[ 'middleware'=>'web','uses'=>'ArticleController@update']);
Route::POST('/rate_by_user', [ 'middleware'=>'web','uses'=>'RatingController@rate_by_user']);
Route::POST('/edit_comment',['middleware'=>'web','uses'=>'CommentController@edit_comment']);
Route::post('/add_comment',['middleware'=>'web','uses'=>'CommentController@create']);

Route::get('/leaderboard', [ 'middleware'=>'web','uses'=>'LeaderboardController@show'] );
