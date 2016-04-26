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

//    public function addDelimiters(&$in) {
//        $in = '/' . trim($in) . '/';
//    }

    public function findReplace() {
        $input = Input::All();
        if (isset($input['find'], $input['replace'], $input['text']) == TRUE) {
            if (empty($input['find']) == false) {
                $find = explode(',', $input['find']);
                $replace=$input['replace'];
//                array_where($find, addDelimiters);
//                $object=new FindController;
//                $object-> addDelimiters($find);
                $str=  is_string($find);
                
                $trim='/'.trim($str).'/';
            }
            $replace = empty($input['replace']) === false ? preg_split('/,\s+/', $input['replace']) : '';
            $text = (empty($find) === false && empty($replace) === false) ? str_replace($find, $replace, $input['text']) : $input['text'];
            echo $text;
        }
    }

}

//if (isset($_POST['find'], $_POST['replace'], $_POST['text']) === true) {
//    if (empty($_POST['find']) == false) {
//        $find = explode(',', $_POST['find']);
//        array_walk($find, 'addDelimiters');
//    }
//    $replace = empty($_POST['replace']) === false ? preg_split('/,\s+/', $_POST['replace']) : '';
//
//    $text = (empty($find) === false && empty($replace) === false) ? preg_replace($find, $replace, $_POST['text']) : $_POST['text'];
//}
