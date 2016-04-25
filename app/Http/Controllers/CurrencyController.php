<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class CurrencyController extends BaseController {

    public function index() {
        return view('layouts/currency');
    }

    public function currencyConvertor() {
        $amount = Input::get('amount');
        $from = Input::get('from');
        $to = Input::get('to');
        $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
        $get = explode("<span class=bld>", $get);
        $get = explode("</span>", $get[1]);
        $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
        return View('/layouts/currency', ['converted_value' => $converted_amount]);
    }

   
}
