<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;

require __DIR__.'/admin.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('view_site/layouts/index');
});

Route::get('/entrepreneur', function () {
    return view('view_site/layouts/author');
});

Route::get('/apropos', function () {
    return view('view_site/layouts/about');
});

Route::get('/services', function () {
    return view('view_site/layouts/Nos_services/services');
});

Route::get('/contact', function () {
    return view('view_site/layouts/contact');
});

Route::get('/compte', function () {
    return view('view_site/layouts/compte');
});

Route::get('/detail', function () {
    return view('view_site/layouts/Nos_services/detail-services');
});

Route::get('/form', function () {
    return view('view_site/layouts/formulaire');
});

Route::get('/catégorie', function () {
    return view('view_site/layouts/categorie');
});

