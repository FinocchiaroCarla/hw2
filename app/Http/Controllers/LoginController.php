<?php

//definire il namespace
namespace App\Http\Controllers;

//includere la classe base
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function signup_form(){

        if(Session::get('myuser_id'))
        {
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('signup')->with('error', $error);
    }

    public function do_signup(){

        if (strlen(request('name')) ==0 || strlen(request('surname')) ==0 || 
            strlen(request('email')) ==0 || strlen(request('username')) ==0 || 
            strlen(request('password')) ==0 || strlen(request('confirm_password')) == 0)
        {
            Session::put('error','empty_fields');
            return redirect('signup')->withInput();
        }

        else if(!preg_match('/^[a-zA-Z]+$/', request('name'))) {
            Session::put('error','invalid_name');
            return redirect('signup')->withInput();
        }

        else if(!preg_match('/^[a-zA-Z _]+$/', request('surname'))) {
            Session::put('error','invalid_surname');
            return redirect('signup')->withInput();
        }

        else if(!filter_var(request('email'), FILTER_VALIDATE_EMAIL)) 
        {
            Session::put('error','invalid_email');
            return redirect('signup')->withInput();
        }

        else if(User::where('email' ,request('email'))->first())
        {
            Session::put('error','exist_email');
            return redirect('signup')->withInput();
        }

        else if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('username')))
        {
            Session::put('error','invalid_username');
            return redirect('signup')->withInput();
        }

        else if(User::where('username', request('username'))->first())
        {
            Session::put('error','exist_username');
            return redirect('signup')->withInput();
        }

        else if (strlen(request('password')) < 8)
        {
            Session::put('error','bad_password');
            return redirect('signup')->withInput();
        }

        else if(request('password') != request('confirm_password'))
        {
            Session::put('error','wrong_password');
            return redirect('signup')->withInput();
        }

        $user = new User;
        $user->name = request('name');
        $user->surname = request('surname');
        $user->email = request('email');
        $user->username = request('username');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->save();

        Session::put('myuser_id', $user->id);

        return redirect('home');

}
    public function check_email($email){
        $user = User::where('email', $email)->first();
        if(!$user){
            $response=array('exists'=>false);
        }else{
        $response=array('exists'=>true);
        }

        return $response;
    }


    public function login_form(){

        if(Session::get('myuser_id'))
        {
           return redirect('home');
        }
        //altrimenti deve fare il login
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error',$error);
    }

    public function do_login(){

        if (strlen(request('username')) ==0 || strlen(request('password')) ==0)
        {
            Session::put('error','empty_fields');
            return redirect('login')->withInput();
        }

        $user = User::where('username', request('username'))->first();
        if(!$user){
            Session::put('error','wrong_user');
            return redirect('login')->withInput();
        }
        else if(!password_verify(request('password'),$user->password)){
            Session::put('error','wrong_password');
            return redirect('login')->withInput();
        }else{
            Session::put('myuser_id', $user->id);
            return redirect('home');
        }

}


    public function logout(){
        Session::flush();
        return redirect('login');
    }


    public function check_username($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            $response=array('exists'=>false);
        }else{
        $response=array('exists'=>true);
        }

        return $response;
    }
}