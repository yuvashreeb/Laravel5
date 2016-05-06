<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\FileLoader;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DateTime;

class CsrfController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        session()->regenerate();
        session(['token' => base64_encode(openssl_random_pseudo_bytes(32))]);
        $Session = session('token');
        return view('csrf', ['value' => $Session]);
    }

    public function indexsecond($Message) {
        session()->regenerate();
        session(['token' => base64_encode(openssl_random_pseudo_bytes(32))]);
        $Session = session('token');

        return view('csrf', ['value' => $Session, 'message' => $Message]);
    }

    public function csrf() {
        $Result = "";
        $Object = new CsrfController();
        session()->regenerate();
        $Quantity = Input::get('quantity');
        $Product = Input::get('product');
        $Token = Input::get('token');
        if (!empty($Quantity) && !empty($Product)) {
            if ($Object->check($Token)) {
                $Result = "processed";
            }
        }
        return Redirect::route('csrfprocess', ['message' => $Result]);
    }

    public function check($Token) {
        session()->regenerate();
        $Get = session()->get('token');
        if ($Token === $Get) {
            Session::pull('token', 'default');
            return TRUE;
        }
        return false;
    }
}
