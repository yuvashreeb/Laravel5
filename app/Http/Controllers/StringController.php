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

class StringController extends BaseController {

    public function string() {
        $name = 'yuva shree bandapally';
        echo substr($name, 0, 4) . '<br>';
        $body = 'This is article.It\'s quite long and could go on for some time,leaving you no room on the page';
        $body = (strlen($body)) > 25 ? substr($body, 0, 25) . "...." : $body;
        echo $body;

        echo '<h3>strtolower</h3>';
        $name = 'YuVa';
        echo strtolower($name) . '<br>';

        $username = 'YuvaShreeBandapally';
        $username_lc = strtolower($username);
        $input1 = 'Yuvashreebandapally';
        if (strtolower($input1) == $username_lc) {
            echo 'ok';
        } else {
            echo 'Doesnt match';
        }

        echo '<h3>htmlentities</h3>';
//echo '<script>alert("Hello")</script>';
        $fromdb = '<script>alert("Hello")</script>';
//charcr to entities
        $sanitised = htmlentities($fromdb);
        echo $sanitised;

        echo '<h3>trim</h3>';
        $userName = '   yuva            ';
        if (strlen(trim($userName)) == 0) {
            echo '<br>Please enter name';
        } else {
            echo '<br>Fine!';
        }

        echo '<h3>Numberformat</h3>';
        $number = 10000000;
        $number--;
        $numberformatted = number_format($number, 0);
        echo 'You have &pound ' . $numberformatted . '<br>';

        $pi = pi();
        $pishort = number_format($pi, 3);
        echo $pishort . '<br>';


//        $name = 'yuva shree bandapally';
//        echo substr($name, 0, 4) . '<br>';
//        $body = 'This is article.It\'s quite long and could go on for some time,leaving you no room on the page';
//        $body = (strlen($body)) > 25 ? substr($body, 0, 25) . "...." : $body;
//        echo $body;
//
//        echo '<h3>strtolower</h3>';
//        $name = 'YuVa';
//        $Lowercase = strtolower($name);
//        return View('string', ['low' => $Lowercase]);
//
//        echo '<h3>htmlentities</h3>';
////echo '<script>alert("Hello")</script>';
//        $fromdb = '<script>alert("Hello")</script>';
////charcr to entities
//        $sanitised = htmlentities($fromdb);
////        echo $sanitised;
//        return View('string', ['entity' => $sanitised]);
//
//        echo '<h3>trim</h3>';
//        $userName = '   yuva            ';
//        if (strlen(trim($userName)) == 0) {
//            echo '<br>Please enter name';
//        } else {
//            echo '<br>Fine!';
//        }
//
//        $username = 'YuvaShreeBandapally';
//        $username_lc = strtolower($username);
//        $input1 = 'Yuvashreebandapally';
//        if (strtolower($input1) == $username_lc) {
//            echo 'ok';
//        } else {
//            echo 'Doesnt match';
//        }
//
//        echo '<h3>Numberformat</h3>';
//        $number = 10000000;
//        $number--;
//        $numberformatted = number_format($number, 0);
////        echo 'You have &pound ' . $numberformatted . '<br>';
//        return View('string', ['entity' => $sanitised]);
//
//        $pi = pi();
//        $pishort = number_format($pi, 3);
//        echo $pishort . '<br>';
    }

}
