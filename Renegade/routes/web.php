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
    })->name('login');

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

    Route::get('logout',[
        'uses' => 'UserController@getLogout',
        'as' =>'logout',
   ]);



    Route::get('dashboard',[
        'uses' => 'PostController@getDashboard',
        'as' =>'dashboard',
   ])->middleware('auth');

    Route::post('createpost',[
    'uses' => 'PostController@createPost',
    'as'   => 'createpost'
    ]);

    Route::get('delete-post/{post_id}',[
        'uses' => 'PostController@getDeletePost',
        'as' =>'post.delete',
   ]);
    Route::post('/edit',function(\Illuminate\Http\Request $request){
        return response()->json(['message' => $request['postId']]);

    })->name('edit');