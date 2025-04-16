<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function connecter(){
        // if(auth()->check()){
        //     return redirect('/admin/dashboard');
        // }
        return view('view_site/layouts/connecter');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        $remember = $request->get('remember', false);

        if (!$remember) {
            $remember = false;
        }
        if (!Auth::validate($credentials, $remember)) :
            Session::put('error', 'Vous avez fait une erreur veuillez la corriger.');
            return redirect('/entrepreneur');
        endif;
        // $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Auth::login($user, $remember);
        // Session::forget('error');

        return $this->authenticated();
    }

}
