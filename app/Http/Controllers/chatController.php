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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class chatController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function chat($name) {

        return view('chatwindow', ['name' => $name]);
    }

    public function chatsubmit() {

        $message = Input::get('message');
        $name = Input::get('name');
        DB::table('chatwindow')->insert(['name' => $name, 'message' => $message]);
        return Redirect::route('chatwindow', ['name' => $name]);
    }

    public function getchat() {
        $returnvalue = null;
        $result = DB::table('chatwindow')->get();
        foreach ($result as $values) {
            foreach ($values as $value => $key) {
                if ($value == 'name') {
                    $returnvalue.="<p>" . $key . " -";
                } else {
                    $returnvalue.= $key . "</p>";
                }
            }
        }
        echo $returnvalue;
    }

}

?>
