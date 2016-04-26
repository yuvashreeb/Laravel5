<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class MultipleController extends BaseController {

    public function index() {
        return view('layouts/multiple');
    }

    public function multipleFile() {
        $Message="";
        $input = Input::file('upload');
        for ($x = 0; $x < count($input); $x++) {
            //echo $name;
            $input[$x]->move("multiuploads", $input[$x]->getClientOriginalName());
        }
        $message="successfully uploaded!!";
        return View('/layouts/multiple', ["value"=>$message]);
    }

}
