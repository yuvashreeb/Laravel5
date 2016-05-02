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

class InheritController extends BaseController {

    public function index() {
        $Book = new Book('children');
        $Book->setProductIsbn('123456789');

        echo 'This ' . $Book->getProductType() . ' book has isbn ' . $Book->getProductIsbn();
    }

}

class Product {

    protected $_type;

    public function getProductType() {
        return $this->_type;
    }

}

class Book extends Product {

    protected $_isbn;

    public function __construct($Type) {
        $this->_type = $Type;
    }

    public function setProductIsbn($Isbn) {
        $this->_isbn = $Isbn;
    }

    public function getProductIsbn() {
        return $this->_isbn;
    }

}
