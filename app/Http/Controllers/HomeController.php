<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
Use App\reg_user;

use Illuminate\Support\Facades\Mail;
//use vendor\laravel\framework\src\Illuminate\Auth\Console\stubs\make\views\auth\emails;

class HomeController extends BaseController {

    public function home() {
        //return 'home';
//        echo $user = reg_user::find(1)->username;
//        echo '<pre>', print_r($user);
//        Mail::send('emails.test',array('name'=>'yuva'),function($message){
//        
//            $message->to('yuvashree.b@karmanya.co.in','yuva shree')->subject('Test email');
//        });
        return view('layouts/home');
    }

}
