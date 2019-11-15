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
Route::resource('categories', 'CategoryController', ['except' =>['create']]);
Route::get('blog/{slug}',['as' =>'blog.single', 'uses'=>'BlogController@getsingleblog'])->where('slug','[\w\d\-\_]+');
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/service','PagesController@service');
Route::get('/contact','PagesController@getcontact');
Route::post('/contact','PagesController@postcontact');





Route::get('/posts/approved','PostsController@getPost')->name('approvedblog');

Route::post('/posts/{post}','PostsController@approved');
Route::resource('/posts','PostsController');

Route::get('/posts/{userId}/single','PostsController@PostbyID')->name('postbyid');

Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);

Route::get('profiles/profile', 'ProfilesController@profile')->name('profile');
Route::post('/profileaddprofile', 'ProfilesController@addprofile')->name('addprofile');







//posts route




// Route::resource('/posts','PostsController');


//  Route::get('/approved','ApprovedController@index');
//  Route::post('/approved','ApprovedController@store');



