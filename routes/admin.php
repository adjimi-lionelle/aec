<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('view_admin/layouts/index');
});
