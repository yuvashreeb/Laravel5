<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class AutoController extends BaseController {

    public function dropdown() {
        return view('layouts/autosuggest');
    }

    public function search() {
$Search = Input::get('search_term');
//
//$Users=DB::table('city')->get();
//foreach ($Users as $names){
//    echo $names->cities;
//}
            $Users = DB::table('city')->select('cities')->where('cities', 'like', $Search."%")->get();
         foreach($Users as $cities)
         {
              foreach($cities as $x=>$City)
              {
                  echo '<li>' . $City . '</li>';
              }
         }
        
    }

}
