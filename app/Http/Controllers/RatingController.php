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

class RatingController extends BaseController {

    public function index() {
//       return View('/layouts/rate');
        $Object = new RatingController();
        $Limit = 4;
        $Article = $Object->get_articles($Limit);
        if(count($Article)==0){
            echo 'Sorry no articles found';
        }else{
            foreach($Article as $Data){
                $Data['Rating']=($Data['RateCount']!=0)?$Data['RateTotal']/$Data['RateCount']:0;
                echo $Data['Rating'];
            }
        }
    }

    public function get_articles($Limit) {
        $Limit = (int) $Limit;
        $Articles = array();
        $Rate = DB::table('Rating')->select('Id', 'Title', 'Ratetotal', 'RateCount')->take($Limit)->get();
//        print_r($Rate);
        $Content=json_decode(json_encode($Rate),TRUE);
        return $Content;
    }

}
