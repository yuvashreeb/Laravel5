<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class AlbumController extends BaseController {

    public function photoAlbum() {
        $page = $_SERVER['PHP_SELF'];
        $column = 2;
        $base = "data";
        $thumbs = "thumbs";
        @$get_album = $_GET['album'];
        if (!$get_album) {
            $choice = "Select an Album";
            $handle = File::directories($base);
            // print_r($handle);
            foreach ($handle as $file) {
                if ($file != 'data/thumbs') {
                    $file = substr($file, "5");

                    // echo $file;
                    $folder[] = $file;
                }
            }
        } else {

            if (!File::isDirectory($base . "/" . $get_album) || (strstr($get_album, ".") != NULL) || (strstr($get_album, "/") != NULL) || (strstr($get_album, "\\") != NULL)) {
                echo "album doesnot exist<br/>";
            }
        }

        return View('/layouts/album', ['Photoalbum_folder' => $folder, "choice" => $choice]);
    }

    public function folder($folder) {

        $path = 'data/' . $folder;
        //echo $path;
        $file = File::Files($path);
//print_r($file);
        return View('/layouts/album', ['Photoalbum_image' => $file]);
    }

}
