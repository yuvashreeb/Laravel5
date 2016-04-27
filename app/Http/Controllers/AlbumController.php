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
        $Page = $_SERVER['PHP_SELF'];
        $Column = 2;
        $Base = "data";
        $Thumbs = "thumbs";
        @$Get_album = $_GET['album'];
        if (!$Get_album) {
            $Choice = "Select an Album";
            $Handle = File::directories($Base);
            // print_r($handle);
            foreach ($Handle as $File) {
                if ($File != 'data/thumbs') {
                    $File = substr($File, "5");

                    // echo $file;
                    $Folder[] = $File;
                }
            }
        } else {

            if (!File::isDirectory($base . "/" . $Get_album) || (strstr($Get_album, ".") != NULL) || (strstr($Get_album, "/") != NULL) || (strstr($Get_album, "\\") != NULL)) {
                echo "album doesnot exist<br/>";
            }
        }

        return View('/layouts/album', ['Photoalbum_folder' => $Folder, "Choice" => $Choice]);
    }

    public function folder($Folder) {

        $Path = 'data/' . $Folder;
        //echo $path;
        $File = File::Files($Path);
//print_r($file);
        return View('/layouts/album', ['Photoalbum_image' => $File]);
    }

}
