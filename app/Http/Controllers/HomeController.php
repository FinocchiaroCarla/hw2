<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Save;

class HomeController extends BaseController
{
    public function home(){

        if(!Session::get('myuser_id'))
        {
        return redirect('login');
        } 
        $user = User::find(Session::get('myuser_id'));
        return view('home')->with('username', $user->username); 

    }

    public function search_recipe($recipe){

        $app_id = '1c7bc491';
        $app_key = '66bce3e1769989a794858ed5acf1ed48';

        $content = urlencode($recipe);

        $url = 'https://api.edamam.com/api/recipes/v2?type=public&q='.$content.'&app_id='.$app_id.'&app_key='.$app_key;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($ch);

        curl_close($ch);

        return $data;

    }

    public function save_recipe($id_rec){

        $app_id = '1c7bc491';
        $app_key = '66bce3e1769989a794858ed5acf1ed48';
        $userid = Session::get('myuser_id');

        $url = 'https://api.edamam.com/api/recipes/v2/'.$id_rec.'?type=public&app_id='.$app_id.'&app_key='.$app_key;

        $dati = file_get_contents($url);

        $arr = json_decode($dati, true);

        $url = $arr['recipe']['images']['REGULAR']['url'];
        $label = $arr['recipe']['label'];
        $type = $arr['recipe']['cuisineType'][0];

        $array = ['id' => $id_rec, 'label' => $label, 'url' => $url, 'type' => $type];

        $save= new Save;
        $save->user_id = $userid;
        $save->content = json_encode($array);

        $save->save();

        if($save){
            return json_encode(array('ok' => true));
            exit;
        }else{
            return json_encode(array('ok' => false));
            exit;
        }
    }

    public function select($id_rec){

        $app_id = '1c7bc491';
        $app_key = '66bce3e1769989a794858ed5acf1ed48';

        $url = 'https://api.edamam.com/api/recipes/v2/'.$id_rec.'?type=public&app_id='.$app_id.'&app_key='.$app_key;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);

        curl_close($ch);

        return $data;
    }


}