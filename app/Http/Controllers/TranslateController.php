<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use session;

class TranslateController extends BaseController {

    public function index() {
        return view('layouts/translatemenu');
    }
   
    public function english(){
        $obj=new TranslateController();
        $word='english';
        $lang = array(
    'hello' => 'Hello',
    'coffee' => 'coffee'
);
        $Result=$obj->init($word,$lang);
        return View('/layouts/translatemenu',['value'=>$Result]);
        
    }
     public function telugu(){
         $obj=new TranslateController();
        $word='telugu';
$lang = array(
    'hello' => 'Hallo',
    'coffee' => 'kaffee'
);
        $Result=$obj->init($word,$lang);
        return View('/layouts/translatemenu',['value'=>$Result]);
    }
    public function init($word,$lang){
       session()->regenerate();
       session(['word'=>$word]);
       if(empty(session()->get('word'))){
           session(['word'=>'english']);
       }
       $Result1=$lang['coffee'];
       return $Result1;
       
    }
}
