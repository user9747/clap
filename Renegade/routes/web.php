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

Route::get('signup', function () {
    return view('signup');
});
Route::get('signin', function () {
    return view('signin');
});
Route::post('postsignup',[
    'uses' => 'UserController@Signup',
    'as' =>'postsignup'
]);
Route::post('postsignin',[
    'uses' => 'UserController@Signin',
    'as' =>'postsignin'
]);
Route::get('dashboard',function(){
    return view('dashboard');
});


Route::get('dashboard',[
    'uses' => 'UserController@getDashboard',
    'as' =>'dashboard'
]);
