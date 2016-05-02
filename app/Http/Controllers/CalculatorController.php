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

class CalculatorController extends BaseController {

    public function index() {
    $Calc=new CalculatorController();
    $Calc->add(10);
    $Calc->add(9);
    $Calc->subtract(6);
    
    $Total=$Calc->getTotal();
    Return View('/layouts/oop',['total'=>$Total]);
    }
    protected $total;
    public function add($value){
        $this->total+=$value;
    }
     public function subtract($value){
        $this->total-=$value;
    }
    public function getTotal(){
        return $this->total;
    }

}
