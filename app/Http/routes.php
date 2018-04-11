<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|'hj
*/





Route::get('/community', function () {
    return view('community');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/nieuws', function () {
    return view('nieuws');
});

Route::get('/resources', function () {
    return view('resources');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});





Route::post('/contactMail', 'ContactController@sendContact');


Route::auth();


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::resource('nieuwsposts','NieuwsController');

Route::resource('communitypost','CommunityController');

Route::resource('profiles', 'ProfileController');

Route::resource('post','PostIdController');






route::get('testauth', 'testController@auth');  