<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class FindController extends BaseController {

    public function index() {
        return view('layouts/find');
    }

    public function findReplace() {
        $find = Input::get('find');

        $replace = Input::get('replace');
        $text = Input::get('text');

        if (isset($_POST['find'], $_POST['replace'], $_POST['text']) === true) {

            $find = explode(',', $_POST['find']);


            $replace = (empty($_POST['replace']) == false) ? explode(',', $_POST['replace']) : '';
            $text = (empty($find) === false && empty($replace) === false) ? str_replace($find, $replace, $_POST['text']) : $_POST['text'];
            $value = $text;
            return view('/layouts/find', ['text' => $value]);
        }
    }

}
