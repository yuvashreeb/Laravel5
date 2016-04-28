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

class SpellController extends BaseController {

    public function index() {
        return view('layouts/spell');
    }
    public function check(){
        $Word=Input::All();
        if(isset($Word['word']) && trim($Word['word'])!=null){
            $Word=$Word['word'];
            //echo $Word;
            $Spellcheck=new SpellController();
            $Spellcheck->spellcheck($Word);
        }
    }
    public function spellcheck($Word){
        $Subword=substr($Word, 0, 1);
//        echo $Subword;
        $users = DB::table('English')->select('Word')->where(DB::raw ('left(Word,1)',$Subword))->get();
        print_r($users);
    }


}
