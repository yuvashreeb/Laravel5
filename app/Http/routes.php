<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array(
    'as'=>'home',
    'uses'=>'HomeController@home'
    ));
//Use App\User;
//Route::get('/User',function(){
//    $user=User::find(1);
//    echo '<pre>',
//    print_r($user);
//});
/*
 * unauthenticated group
 */
Route::group(array('before'=>'guest'),function(){
    /*
     * CSRF protection group
     */
    
    Route::group(array('before'=>'csrf'),function(){
    /*
     * create account(POST)
     */
    Route::post('/account/create',array(
       'as'=>'account-create-post',
        'uses'=>'AccountController@postCreate'
    ));
        
    });
    /*
     * create account(GET)
     */
    Route::get('/account/create',array(
       'as'=>'account-create',
        'uses'=>'AccountController@getCreate'
    ));
    Route::get('/account/activate/{code}',array(
        'as'=>'account-activate',
        'uses'=>'AccountController@getActivate'
        
    ));
    
});