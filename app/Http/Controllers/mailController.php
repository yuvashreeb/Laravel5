<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Mail;
use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class mailController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public $email = "yuva2312@gmail.com";

       public function mailinglist() {

        $mail = DB::table('mailinglist')->select('name', 'email')->get();
        return view('mailview', ['mail' => $mail]);
    }

    public function maillistsubmit() {
        $messagereturn=null;
        $value = Input::get('count');
        $message=Input::get('message');
        for ($x = 0; $x < $value; $x++) {
            if (Input::get('mail_' . $x)) {
                $email = Input::get('mail_' . $x);
               $val= Mail::raw($message, function ($message)use($email) {
                    $message->from('yuvashree.b@karmanya.co.in', 'yuva');
                    $message->to($email)->subject("Mail list");
                });
            }
        }
        if($val){
            
            $messagereturn="Mails sent successfully";
        }
        else{
            $messagereturn="Mails could not be sent please try again";
        }
        
        $mail = DB::table('mailinglist')->select('name', 'email')->get();
        return view('mailview', ['mail' => $mail,'message'=>$messagereturn]);
    }

}

?>
