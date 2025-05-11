<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function connecter(){
        if(!empty(Auth::check())){
            return redirect('/dashboard');
        }
        return view('view_site/layouts/connecter');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        // $credentials = $request->validate([
        //     'email'=> ['required','email'],
        //     'password'=>['required','min:4']
        // ]);

        // $credentials = $request->getCredentials();
        // $user = Auth::getProvider()->retrieveByCredentials($credentials);
        // dd($user);
    
    
    }

     protected function authenticated(Request $request, $user)
     {
         return redirect()->intended($this->redirectPath());
     }

     public function deconnecter(){
        Auth::logout();
        return redirect('');
    }

}
