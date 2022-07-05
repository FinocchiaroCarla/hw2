<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Save;

class LikeController extends BaseController
{
    public function like(){

        if(!Session::get('myuser_id'))
        {
        return redirect('login');
        }
        $user = User::find(Session::get('myuser_id'));
        return view('like')->with('username', $user->username); 

    }

    public function load(){

        $element=[];

        $user = User::find(Session::get('myuser_id'));

        $saves = $user -> saves;

        foreach ($saves as $save) {
            $element[] = array($save->id, json_decode($save->content));
        }

        return json_encode($element);

    }

    public function delete($element_id){
         $elem = Save::find($element_id);
         $elem->delete();
    }


}