<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('layouts/index');
});

Route::get('/entrepreneur', function () {
    return view('layouts/author');
});

Route::get('/apropos', function () {
    return view('layouts/about');
});

Route::get('/services', function () {
    return view('layouts/Nos_services/services');
});

Route::get('/contact', function () {
    return view('layouts/contact');
});

Route::get('/detail', function () {
    return view('layouts/Nos_services/detail-services');
});

Route::get('/connecter', function () {
    return view('layouts/connecter');
});

Route::get('/form', function () {
    return view('layouts/formulaire');
});

Route::get('/catégorie', function () {
    return view('layouts/categorie');
});


