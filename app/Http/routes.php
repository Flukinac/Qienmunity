<?php

Route::get('/', function () {

    return "ok";
 //   return view('home');
});

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

Route::get('/profiel', function () {
    return view('profiel');
});

Route::get('/nieuwprofiel', function () {
    return view('nieuwprofiel');

});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/verify', function () {
    return "testing posting";

});



Route::auth();

Route::get('/home', 'HomeController@index');

