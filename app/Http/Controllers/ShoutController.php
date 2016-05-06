<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ShoutController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

public function shout(){
    
    $Array=DB::table('shoutbox')->get();
    return view('/layouts/shoutbox',['array'=>$Array]);
}
public function shoutboxsubmit(){
    $Name=Input::get('name');
    $Message=Input::get('message');
    $Query=DB::table('shoutbox')->insert(['name'=>$Name,'message'=>$Message]);
    return Redirect::Route('shoutbox');
}

}

?>