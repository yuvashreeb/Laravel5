<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class AtomController extends BaseController {

    public function reader() {
        $FeedUrl = 'http://php.net/feed.atom';
        $Feed = simplexml_load_file($FeedUrl);
        $Limit = 7;
        $Count = 1;
        foreach ($Feed->entry as $Item) {
            if ($Count <= $Limit) {
                $Title[] = $Item->title;
                $Url[] = $Item->id;
//                echo '<li><a href="', $Url, '">', $Title, '</a></li>';
            }
            $Count++;
        }
   return View('/layouts/reader',['Url'=>$Url,'Feed'=>$Title]);
    }
}
