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

class ChatController extends BaseController {

    public function index(){
        session()->regenerate();
        $User=(isset($_GET['User'])==TRUE)?(int)$_GET['User']:0;
        session(['User'=>$User]);
        echo session()->get('User');
        return View('/layouts/chat');
    }

}
