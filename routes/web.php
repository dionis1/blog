<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "AdminController@show");
Route::get('/show/{id}',"AdminController@postshow");

Auth::routes();

//POST Route's

Route::group(["middleware"=>"auth"],function(){
    
    Route::get('/post', "PostController@index");
    Route::get('/post/show/{id}', "PostController@show");
    Route::post('post/show/{id}', "CommentController@addComment");
    Route::get('post/show/edit/{id}',"PostController@edit");

    Route::get('/post/add' , "PostController@add");
    Route::post('/post/create' , "PostController@create");
    Route::get('/post/edit/{id}',"PostController@edit");
    Route::post('/post/update' , "PostController@update");
    Route::get('/post/delete/{id}', "PostController@delete");
    Route::post('/post/delete/submitdelete', "PostController@submitdelete");
});

Route::get('/admin',"AdminController@index");

