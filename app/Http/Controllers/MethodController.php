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

class MethodController extends BaseController {

    public function index() {
       $food=new MethodController();
       $food->setProductType('pastry');
       echo'This item is ',$food->getProductType();
    }
    public $type;
    public function setProductType($value){
        $this->type=$value;
    }
    public function getProductType(){
        $Result= $this->type;
        return View('/layouts/oop',['output'=>$Result]);
    }

}
