<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;


class PrivateController extends BaseController
{
    public function private(){

        if(!Session::get('myuser_id'))
        {
            return redirect('login');
        }

        $error = Session::get('error');
        Session::forget('error');

        $user = User::find(Session::get('myuser_id'));
        $name = $user->name;
        $surname = $user->surname;
        $email = $user->email;
        $username = $user->username;
        return view('private')->with('name', $name)
                              ->with('surname', $surname)
                              ->with('email', $email)
                              ->with('username', $username)
                              ->with('error', $error);
    }

    public function change(){

        if(!Session::get('myuser_id'))
        {
            return redirect('login');
        }

        if(request('email')){
            if (!filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
                $errore = "Email non valida";
            }
            else if(User::where('email' ,request('email'))->first()){
                Session::put('error','exists_email');
                return redirect('private')->withInput();
            }
            else{
                $affected = User::find(Session::get('myuser_id'))
                            ->update(['email' => request('email')]);

                return redirect('logout');
            }
        }
        
        if(request('username')){
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('username'))) {
                $errore = "Username non valido";
            }
            else if(User::where('username' ,request('username'))->first()){
                Session::put('error','exists_username');
                return redirect('private')->withInput();
            }
            else{
                $affected = User::find(Session::get('myuser_id'))
                            ->update(['username' => request('username')]);

                return redirect('logout');
            }
        }

    }

    public function drop(){
        $user = User::find(Session::get('myuser_id'));
        $user->delete();
        return redirect('logout');
    }

    
}