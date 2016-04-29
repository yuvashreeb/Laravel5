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
            $Output=$Spellcheck->spellcheck($Word);
//            print_r($Output);
            return View('/layouts/spell',['Words'=>$Output]);
        }
    }
    public function spellcheck($Word){
        $Subword=substr($Word, 0, 1);
//        echo $Subword;
        $User = DB::table('English')->select('Word')->where('Word','like',$Subword.'%')->get();
//        $WordExists=DB::table('English')->select(count('Word'))->where('Word','<>',$Word);
//        print_r($WordExists);
        foreach($User as $Array){
            foreach($Array as $x=>$value){
                if($x=='Word'){
                    similar_text($Word, $value,$percent);
                    if($percent>80){
                        $Result[]=$value;
                    }
                }
            }
        }
        return(empty($Result)?false:$Result);
    }


}
