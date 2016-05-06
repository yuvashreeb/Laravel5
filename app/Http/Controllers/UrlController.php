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
use Illuminate\Support\Facades\DB;

class UrlController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        return view('Url');
    }

    public function shorten() {
        $object = new UrlController();
        $input = Input::get('text');
        if (empty($input)) {
            echo 'error_no_url';
        } else {

            if (filter_var($input, FILTER_VALIDATE_URL) === false && !(strlen($input) == 6)) {

                echo 'error_invalid_url';
            } else {
                if ($object->is_min($input)) {
                    echo 'error_is_min';
                } else {
                    if (strlen($input) == 6) {
                        $url = $object->redirect($input);
                        $url1 = json_decode(json_encode($url), true);
                        return $url1;
                    }
                    if (filter_var($input, FILTER_VALIDATE_URL)) {
                        while (!$object->code_exists($code = $object->gen_code())) {
                            echo 'http://min.bz/' . $object->urlshort($input, $code);
                            break 1;
                        }
                    } else {
                        echo 'not a min';
                    }
                }
            }
        }
    }

    function is_min($url) {
        return (preg_match("/min\.bz/i", $url)) ? true : false;
    }

    function gen_code() {
        $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle($charset), 0, 6);
    }

    function code_exists($code) {
        $code_exists = DB::table('UrlShorten')->where('Code', $code)->count("Id");
        return ($code_exists == 1) ? true : false;
    }

    function urlshort($url, $code) {
        DB::table('UrlShorten')->insert(
                ['Url' => $url, 'Code' => $code]
        );
        return $code;
    }

    function redirect($code) {
        $object = new UrlController();
        if ($object->code_exists($code)) {
            $url = DB::table('UrlShorten')->select('Url')->where('Code', $code)->get();
            return $url;
        }
    }

}
