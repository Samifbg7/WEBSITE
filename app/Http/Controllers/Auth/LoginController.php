<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => "L'adresse mail est requis",
            'email.email' => "L'adresse mail doit etre une adresse mail valide",
            'password.required'=>"Un mot de passe est requis",

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
           return redirect(route('dashboard.index'));
        }

        return redirect(route('login.index'))->with('error', 'Les identifiants sont incorrect');

    }
    public function logout(){
        Auth::logout();
        return redirect(route('landingpage.home'))->with('success','Vous avais bien ete deconnecter');
    }
}
