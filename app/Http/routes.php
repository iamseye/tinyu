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
Route::get('/',function(){
    return view('demo');
});

Route::group(['prefix' => 'demo'], function () {

    Route::get('/','IndexController@index');
    Route::get('/about','InfoController@about');
    Route::get('/product/cate/{cate}','ProductController@showCatePage');
    Route::resource('/product','ProductController');
    Route::resource('/news','NewsController');
    Route::get('/contact','InfoController@contact');
    Route::post('/message','InfoController@message');
});


//backend
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function($router) {

    Route::get('/','InfoController@editInfo');

    Route::group(['prefix' => 'overview'], function () {
        Route::get('/','InfoController@editInfo');
        Route::get('/info','InfoController@editInfo');
        Route::patch('/info/update/{id}','InfoController@updateInfo');
        Route::get('/about','InfoController@editAboutUs');
        Route::patch('/about/update/{id}','InfoController@updateAboutUs');
        Route::get('/contact','InfoController@editContact');
        Route::patch('/contact/update/{id}','InfoController@updateContact');

    });

    Route::resource('/product','ProductController');
    Route::get('/product/cate/{cate}','ProductController@showCatePage');
    Route::resource('/productPics','ProductPicsController');
    Route::post('/productPics/update_main/{id}','ProductPicsController@update_main');
    Route::delete('/carouselPicDel/{id}','ProductController@carouselDel');
    Route::delete('/areaPicDel/{id}','ProductController@areaDel');


    Route::resource('/indexPics','IndexPicsController');

    Route::resource('/news','NewsController');
    Route::get('/news/cate/{cate}','NewsController@showCatePage');

    Route::resource('/msg','MsgController');

});


Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController'
]);
Route::auth();