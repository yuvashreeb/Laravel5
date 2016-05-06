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

class transulateController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function translate($language) {
        
        return view('transulate', ['language' => $language]);
    }

    public function main() {

        return view('transulate', ['language' => "english"]);
    }

    public function menu($language) {

        $object = new transulateController();
        $menu = $object->$language();
        return view('menu',['menu'=>$menu,'language'=>$language]);
    }

    public function english() {

        $lang = array(
            "hello" => "Hello",
            "coffee" => "Coffee",
            "welcome" => "Welcome",
            "pizza" => "Pizza",
            "burger" => "Burger",
            "rice" => "Rice",
            "icecream" => "Ice Cream"
        );

        return $lang;
    }

    public function spanish() {

        $lang = array(
            "hello" => "Hola",
            "coffee" => "Café",
            "welcome" => "Bienvenido",
            "pizza" => "la pizza",
            "burger" => "hamburguesa",
            "rice" => "arroz",
            "icecream" => "helado"
        );


        return $lang;
    }

    public function telugu() {

        $lang = array(
            "hello" => "హలో",
            "coffee" => "కాఫీ",
            "welcome" => "స్వాగత",
            "pizza" => "పిజ్జా",
            "burger" => "బర్గర్",
            "rice" => "వరి",
            "icecream" => "ఐస్ క్రీం"
        );


        return $lang;
    }

}

?>

