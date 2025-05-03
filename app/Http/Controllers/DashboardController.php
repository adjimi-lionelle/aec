<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        // if(auth()->check()){
        //     return redirect('/admin/dashboard');
        // }
        return view('view_admin/layouts/dashboard');
    }
}
