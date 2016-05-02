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
Route::get('/autosuggestdrop',array(
    'as'=>'dropdown',
    'uses'=>'AutoController@dropdown'
));
Route::post('search','AutoController@search');
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
//atom feed
Route::get('/reader',array(
    'as'=>'reader',
    'uses'=>'AtomController@reader'
));
//Route::get('/atomfunction',array(
//   'as'=>'atom',
//    'uses'=>'AtomController@atom'
//));
//photoalbum
Route::get('/photoalbum',array(
    'as'=>'photoalbum',
    'uses'=>'AlbumController@photoAlbum'
));
Route::get('/photoalbum-album{folder}',array(
    'as'=>'folder',
    'uses'=>'AlbumController@folder'
));
//guestbook
Route::get('/guestbook','GuestController@index');
Route::post('/guestbookpost',array(
    'as'=>'upload',
    'uses'=>'GuestController@upload'
));
//spellchecker
Route::get('/spellchecker','SpellController@index');
Route::post('/spellcheckerpost',array(
    'as'=>'check',
    'uses'=>'SpellController@check'
));
//Chat app
Route::get('/chatbox','ChatController@index');
//Route::post('/chatboxpost',array(
//   'as'=>'chatbox',
//    'uses'=>'ChatController@chatbox'
//));
//Rating system
Route::get('/Rating','RatingController@index');
//OOPS
Route::get('/oops','MethodController@index');
Route::get('/calculator','CalculatorController@index');
Route::get('/constructor','ConstructorController@index');
Route::get('/protected','ProtectedController@index');
Route::get('/inheritence','InheritController@index');
Route::get('/scope','scopeController@index');




