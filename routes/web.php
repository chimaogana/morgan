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
Auth::routes();

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/service','PagesController@service');
Route::get('/contact','PagesController@getcontact');
Route::post('/contact','PagesController@postcontact');




Route::get('/posts/approved','PostsController@getPost')->name('approvedblog');

Route::resource('/posts','PostsController');
Route::post('/posts/{post}','PostsController@approved');


Route::get('/posts/{userId}/single','PostsController@PostbyID')->name('postbyid');

Route::resource('comments','CommentsController');





//posts route




// Route::resource('/posts','PostsController');


//  Route::get('/approved','ApprovedController@index');
//  Route::post('/approved','ApprovedController@store');



Route::get('/home', 'HomeController@index')->name('home');
