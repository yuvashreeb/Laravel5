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
    'as' => 'home',
    'uses' => 'HomeController@home'
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
Route::group(array('before' => 'guest'), function() {
    /*
     * CSRF protection group
     */

    Route::group(array('before' => 'csrf'), function() {
        /*
         * create account(POST)
         */
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate'
        ));
    });
    /*
     * create account(GET)
     */
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate'
    ));
    Route::get('/account/activate/{code}', array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));
});
//hit counter
Route::get('/Counter', array(
    'as' => 'Counter',
    'uses' => 'counterController@count'
));
//secure file upload
Route::get('/secureupload', 'SecureController@index');
Route::post('/secure', array(
    'as' => 'secureupload',
    'uses' => 'SecureController@uploadFile'
));
//multiplefile upload
Route::get('/multipleupload', 'MultipleController@index');
Route::post('/multiple', array(
    'as' => 'multipleupload',
    'uses' => 'MultipleController@multipleFile'
));
//currency convertor
Route::get('/currencyconvertor', 'CurrencyController@index');
Route::post('/currency', array(
    'as' => 'currencyconvertor',
    'uses' => 'CurrencyController@currencyConvertor'
));
//Autosuggestdropdown
Route::get('/autosuggestdrop', array(
    'as' => 'dropdown',
    'uses' => 'AutoController@dropdown'
));
Route::post('search', 'AutoController@search');
//Find Replace
Route::get('/findreplace', 'FindController@index');
Route::post('/find', array(
    'as' => 'findreplace',
    'uses' => 'FindController@findReplace'
));
//Template engine
Route::get('/templateengine', 'TemplateController@index');
//atom feed
Route::get('/reader', array(
    'as' => 'reader',
    'uses' => 'AtomController@reader'
));
//photoalbum
Route::get('/photoalbum', array(
    'as' => 'photoalbum',
    'uses' => 'AlbumController@photoAlbum'
));
Route::get('/photoalbum-album{folder}', array(
    'as' => 'folder',
    'uses' => 'AlbumController@folder'
));
//guestbook
Route::get('/guestbook', 'GuestController@index');
Route::post('/guestbookpost', array(
    'as' => 'upload',
    'uses' => 'GuestController@upload'
));
//spellchecker
Route::get('/spellchecker', 'SpellController@index');
Route::post('/spellcheckerpost', array(
    'as' => 'check',
    'uses' => 'SpellController@check'
));
//Rating system
Route::get('/Rating', array(
    'as' => 'Ratingindex',
    'uses' => 'RatingController@index'
));
Route::get('/Rating/{item}/{rating}/{limit}', array(
    'as' => 'rating',
    'uses' => 'RatingController@rating'
));

//OOPS
Route::get('/oops', 'MethodController@index');
Route::get('/calculator', 'CalculatorController@index');
Route::get('/constructor', 'ConstructorController@index');
Route::get('/protected', 'ProtectedController@index');
Route::get('/inheritence', 'InheritController@index');
Route::get('/scope', 'scopeController@index');
//search engine
Route::get('/searchengine', 'SearchController@index');
Route::post('/searchenginepost', array(
    'as' => 'searchenginepost',
    'uses' => 'SearchController@searchEngine'
));
//shoutbox
Route::get('/shoutboxpost', array(
    'as' => 'shoutbox',
    'uses' => 'ShoutController@shout'
));
Route::post('/shoutboxsubmit', array(
    'as' => 'shoutboxsubmit',
    'uses' => 'ShoutController@shoutboxsubmit'
));
//translate pages
Route::get('translate/{language}', array(
    "as" => 'translate',
    'uses' => 'transulateController@translate'
));
Route::get('translatepage', array(
    "as" => 'translatepage',
    'uses' => 'transulateController@main'
));
Route::any('menu/{language}', array(
    'as' => 'menu',
    'uses' => 'transulateController@menu'
));
//Rss
Route::get('/Rss', 'RssController@index');
//csrfp(cross site)
Route::get("/Csrf", 'CsrfController@index');
Route::post('Csrf', array(
    "as" => 'csrf',
    'uses' => 'CsrfController@csrf'
));
Route::get('csrfprocess/{message}', array(
    'as' => 'csrfprocess',
    'uses' => 'CsrfController@indexsecond'
));
//urlshortner
Route::get('UrlShorten', 'UrlController@index');
Route::post('shorten', 'UrlController@shorten');
//mailing list
Route::get('mailinglist', array(
    'as' => 'mailinglist',
    'uses' => 'mailController@mailinglist'
));
Route::post('mailinglist/maillistsubmit', array(
    'as' => 'mailinglist/maillistsubmit',
    'uses' => 'mailController@maillistsubmit'
));
//chat window

Route::get('chatwindow/{name}', array(
    'as' => 'chatwindow',
    'uses' => 'chatController@chat'
));
Route::post('/chatsubmit', 'chatController@chatsubmit');

Route::post('/getchat', 'chatController@getchat');
//Likebutton
Route::get('LikeButton', array(
    'as' => 'LikeButton',
    'uses' => 'LikeController@index'));
Route::post('like_add', 'LikeController@like_add');
Route::post('like_get', 'LikeController@like_get');
//Image upload website

Route::get('imageupload', 'imageController@home');

Route::get('imageupload/register', array(
    'as' => 'register',
    'uses' => 'imageController@register'
));
Route::get('imageupload/home', array(
    'as' => 'homeimage',
    'uses' => 'imageController@home'
));
Route::any('imageupload/login', array(
    'as' => 'loginUser',
    'uses' => 'imageController@login'
));

Route::post('imageupload/registration', array(
    'as' => 'registersubmit',
    'uses' => 'imageController@registersubmit'
));

Route::get("hai", 'imageController@hai');

Route::get("imageupload/showalbums", array(
    'as' => 'albums',
    'uses' => "imageController@albums"
));
Route::get("imageupload/createalbums", array(
    'as' => 'createalbum',
    'uses' => "imageController@createalbum"
));
Route::get("imageupload/uploadimage", array(
    'as' => 'imageupload',
    'uses' => "imageController@imageuploadview"
));
Route::post('imageupload/createalbum', array(
    'as' => 'createalbumsubmit',
    'uses' => 'imageController@createalbumsubmit'
));
Route::post('imageupload/imagesave', array(
    'as' => 'imageuploadsubmit',
    'uses' => 'imageController@imageupload'
));
Route::get('viewalbum/{name}', array(
    'as' => 'viewalbum',
    'uses' => "imageController@viewalbum"));
Route::get("deletealbum/{name}", array(
    'as' => 'deletealbum',
    'uses' => 'imageController@deletealbum'
));
Route::get("imagedelete/{name}", array(
    'as' => 'imagedelete',
    'uses' => 'imageController@imagedelete'
));
Route::get("editalbum/{name}", array(
    'as' => 'editalbum',
    'uses' => 'imageController@editalbum'
));
Route::post("imageupload/editalbum", array(
    'as' => "editalbumname",
    'uses' => "imageController@editalbumname"
));
//mini shopping cart

Route::get('minishoppingcart', array(
    'as' => 'minishoppingcart',
    'uses' => 'likebuttonController@shoppingcart'
));
Route::post('addtocart', array(
    'as' => 'addtocart',
    'uses' => 'likebuttonController@addcart'
));
Route::post('checkcart', 'likebuttonController@checkcart');
Route::post('checkout', array(
    'as' => 'checkout',
    'uses' => 'likebuttonController@checkout'
));
Route::get('incrementproduct/{id}', array(
    'as' => 'incrementproduct',
    'uses' => 'likebuttonController@addproduct'
));

Route::get('decrementproduct/{id}', array(
    'as' => 'decrementproduct',
    'uses' => 'likebuttonController@deductproduct'
));
Route::get('deleteproduct/{id}', array(
    'as' => 'deleteproduct',
    'uses' => 'likebuttonController@deleteproduct'
));
Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'likebuttonController@payment'
));
Route::post('paid', array(
    'as' => 'paid',
    'uses' => 'likebuttonController@paid'
));
//string
Route::get('stringfunctions', 'StringController@string');
//watermark
Route::get('water', 'WatermarkController@index');
Route::post('watermark', array(
    'as' => 'Secureupload',
    'uses' => 'WatermarkController@uploadFile'
));





