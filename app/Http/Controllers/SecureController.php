<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class SecureController extends BaseController {

    public function index() {
        return view('layouts/secure');
    }

    public function uploadFile() {

        $input = input::file('image');
        $error = array();
        $allowed = array('jpg', 'jpeg', 'gif', 'png');
        $file_name = $input->getClientOriginalName();
        @$file_ext = strtolower(end(explode('.', $file_name)));

        $file_size = $input->getClientSize();

        if (in_array($file_ext, $allowed) === FALSE) {
            $error[] = 'extension not allowed';
        }
        if ($file_size > 2097152) {
            $error[] = 'file size should be less than 2 mb';
        }
        if (empty($error)) {
            $input->move("Uploads", $input->getClientOriginalName());
            $error[] = "successfully uploaded";
        }

        return View('layouts/secure', ['Secure_value' => $error]);
    }

}
