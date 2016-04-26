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
//hit counter
Route::get('/Counter',array(
    'as'=>'Counter',
    'uses'=>'counterController@count'
));
//secure file upload
Route::get('/secureupload','SecureController@index');
Route::post('/secure',array(
    'as'=>'secureupload',
    'uses'=>'SecureController@uploadFile'
));
//multiplefile upload
Route::get('/multipleupload','MultipleController@index');
Route::post('/multiple',array(
    'as'=>'multipleupload',
    'uses'=>'MultipleController@multipleFile'
));
//currency convertor
Route::get('/currencyconvertor','CurrencyController@index');
Route::post('/currency',array(
    'as'=>'currencyconvertor',
    'uses'=>'CurrencyController@currencyConvertor'
));
//Autosuggestdropdown
Route::get('/autosuggestdrop','AutoController@index');
Route::post('/autosuggest',array(
    'as'=>'autosuggestdrop',
    'uses'=>'AutoController@autoSuggestDropDown'
));
//Find Replace
Route::get('/findreplace','FindController@index');
Route::post('/find',array(
    'as'=>'findreplace',
    'uses'=>'FindController@findReplace'
));
//Template engine
Route::get('/templateengine','TemplateController@index');
//translate pages
Route::get('/translate',array(
    'as'=>'index',
    'uses'=>'TranslateController@index'
));
Route::get('/english',array(
    'as'=>'english',
    'uses'=>'TranslateController@english'
));
Route::get('/telugu',array(
    'as'=>'telugu',
    'uses'=>'TranslateController@telugu'
));



