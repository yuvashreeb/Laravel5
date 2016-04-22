<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
Use App\reg_user;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use Hash;
use Illuminate\Support\Facades\URL;


class AccountController extends BaseController {

    public function getCreate() {
        return view('account.create');
    }

    public function postCreate() {
        $validator = validator(Input::all(), array(
            'email' => 'required|max:50|email|unique:User',
            'username' => 'required|max:20|min:3|unique:User',
            'password' => 'required|min:6',
            'password_again' => 'required|same:password'
                )
        );
        if ($validator->fails()) {
            return \Redirect::route('account-create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $email = Input::get('email');
            $username = Input::get('username');
            $password = Input::get('password');
            //activation code
            $code = str_random(60);
            $create = reg_user::create(array(
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'active' => 0
            ));
            if ($create) {
                //send email
                Mail::send('emails.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($create) {
                    $message->to($create->email, $create->username)->subject('Activate your account');
                });



                return \Redirect::route('home')
                                ->with('global', "Your account has been created! We have sent you an email to activate your account.");
            }
        }
    }

    public function getActivate($code) {
        $create=reg_user::where('code','=','$code')->where('active','=',0);
       if($create->count()){
           $create=$create->first();
//           echo '<pre>',print_r($create),'</pre>';
           $create->active=1;
           $create->code='';
           
           if($create->save()){
              return \Redirect::route('home')
                      ->with('global','Activated!You can now sign in!');
              
                      
           }
       }
       return \Redirect::route('home')
               ->with('global','We could not activate your account.Try again later');
        
        
    }

}
