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

// Route::get('/', function () {
//     return view('welcome');
// });


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

    //profile routes
    Route::resource('profile','ProfileController');

    //Blog Settings routs

    Route::resource('settings','SettingsController')->only('index','update');

    //todo routs
    
    Route::group(['prefix' => 'todos'], function() {
        Route::resource('/','TodoController')->only('store','destroy');
        Route::get('getTodos','TodoController@getTodos');
        Route::put('{id}/markDone','TodoController@markDone');
    });
    


    

});

    //frontend routs

    Route::get('/',[
        'uses'=>'FrontEndController@index',
        'as'=>'blog.index'
    ]);
    Route::get('/post/{slug}',[
        'uses'=>'FrontEndController@getPost',
        'as'=>'post.single'
    ]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
