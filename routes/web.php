<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/t', function () {
    return view('layouts/index');
});

Route::get('/r', function () {
    return view('layouts/author');
});

Route::get('/a', function () {
    return view('layouts/about');
});

Route::get('/c', function () {
    return view('layouts/categorie');
});

Route::get('/o', function () {
    return view('layouts/contact');
});

Route::get('/d', function () {
    return view('layouts/detail-blog');
});

Route::get('/f', function () {
    return view('layouts/connecter');
});



