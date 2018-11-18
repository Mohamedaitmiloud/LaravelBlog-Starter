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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    
    Route::get('/',[
        'uses' => 'DashboardController@index',
        'as' => 'admin'
    ]);

    //Categories routs
    Route::resource('categories', 'CategoriesController');
    //tags routs 
    Route::resource('tags','TagsController');
    //posts routs
    Route::resource('posts','PostsController');
    Route::get('/trashed','PostsController@trashed')->name('posts.trashed');
    Route::get('/post/{id}/restore','PostsController@restore')->name('posts.restore');
    Route::get('/post/{id}/delete','PostsController@delete')->name('posts.delete');

    //users routs

    Route::resource('users','UsersController');
    Route::get('/user/{id}/makeAdmin','UsersController@makeAdmin')->name('users.makeAdmin');
    Route::get('/user/{id}/removeAdmin','UsersController@removeAdmin')->name('users.removeAdmin');
    

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
