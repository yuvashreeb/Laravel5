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

class ProtectedController extends BaseController {

    public function index() {
       $Book=new Book(8.99);
       $FinalCost= 'Total Vat Amount is Rs. '.$Book->calculateProductVAT();
       return View('/layouts/oop',['Amount'=>$FinalCost]);
    }

}

class Product {

    protected $_price;
    public function calculateProductVAT(){
       return $this->_price*0.20; 
    }

}
final class Book extends Product{
    public function __construct($price) {
        $this->_price=$price;
    }
}
