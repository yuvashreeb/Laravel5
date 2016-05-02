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

class ConstructorController extends BaseController {

    public function index() {
        $Book = new product('Book', 10.50);
        $Product=$Book->getProductType();
        $Price=$Book->getProductPrice();
        Return View('/layouts/oop', ['product' => $Product],['price'=>$Price]);
    }

}

class product {

    protected $_type;
    protected $_price;

    public function __construct($type, $price) {
        $this->_type = $type;
        $this->_price = $price;
    }

    public function getProductType() {
        return $this->_type;
    }

    public function getProductPrice() {
        return $this->_price;
    }

}
