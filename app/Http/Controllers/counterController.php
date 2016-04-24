<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;


class counterController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    
    public function  count(){
        $filename='counter.txt';
            
            $current_value = (File::exists($filename)) ? File::get($filename) : 0;
        
        File::put('counter.txt', ++$current_value);
        
        return View('/layouts/Counter', ['current_value1' => $current_value]);
    }
       

}
?>