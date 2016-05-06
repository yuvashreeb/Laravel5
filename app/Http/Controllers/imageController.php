<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;
use App\Usermodel;
use File;
use Illuminate\Support\Facades\Storage;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class imageController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        session()->regenerate();
        session(['id' => null]);
        return View('imageUpload/homeimage');
    }

    public function register() {

        return View('imageUpload/imageregister');
    }

    public function login() {
        session()->regenerate();
        if (session('id') !== null) {

            $user = DB::table('UserDetails')->select('Name', 'UserId')->where('UserId', session('id'))->get();
            foreach ($user as $value) {
                foreach ($value as $x => $y) {
                    if ($x == 'UserId') {
                        session(['id' => $y]);
                    }
                    if ($x == 'Name') {
                        $name1 = $y;
                    }
                }
            }
            return view("imageUpload/userLogin", array(
                "Name" => $name1
            ));
        }
        $LoginEmailAddress = Input::get('userEmail');
        $LoginPassword = Input::get('userPassword');
        $users = DB::table('UserDetails')->select('Name', 'UserId')->where('Email', $LoginEmailAddress)->where('Password', $LoginPassword)->get();

        if ($users) {
            foreach ($users as $value) {
                foreach ($value as $x => $y) {
                    if ($x == 'UserId') {
                        session(['id' => $y]);
                    }
                    if ($x == 'Name') {
                        $name = $y;
                    }
                }
            }

            return view("imageUpload/userLogin", array(
                "Name" => $name
            ));
        } else {
            return View('imageUpload/homeimage', array(
                'errorLogin' => 'UserName or Password Incorrect'
            ));
        }
    }

    public function registersubmit() {
        $FirstName = Input::get('firstName');
        $EmailAddress = Input::get('emailAddress');
        $Password = Input::get('password');
        $validateError = null;
        $validate = null;
        $Insert = DB::table('UserDetails')->insert(
                ['Name' => $FirstName,
                    'Email' => $EmailAddress,
                    'Password' => $Password]
        );
        if ($Insert == 1) {
            $validate = "Registration Complete successfully Please Login";
        } else {
            $validateError = "Could not register try again later";
        }

        return view('imageUpload/imageregister', array(
            'message' => $validate,
            'error' => $validateError
        ));
    }

    public function albums() {

        session()->regenerate();
        $UserId = session('id');
        $Album = DB::table('AlbumDetails')->select('Name', 'Desc')->where('UserId', session('id'))->get();
        return view('imageUpload/useralbum', array(
            'Album' => $Album
        ));
    }

    public function createalbum() {

        return view('imageUpload/usercreatealbum');
    }

    public function createalbumsubmit() {

        session()->regenerate();
        $UserId = session('id');
        $AlbumName = Input::get('albumName');
        $AlbumDesc = Input::get('albumDesc');
        $validate = null;
        $validateError = null;
        $dt = new DateTime();
        $Time = $dt->format('Y-m-d H:i:s');
        $path = 'directory/' . $UserId;
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        File::makeDirectory($path . "/" . $AlbumName);
        $Insert = DB::table('AlbumDetails')->insert(
                ['Name' => $AlbumName,
                    'Desc' => $AlbumDesc,
                    'UserId' => $UserId,
                    'Time' => $Time]
        );
        if ($Insert == 1) {
            $validate = "Album created successfully";
        } else {
            $validateError = "Could not create";
        }
        return view('imageUpload/usercreatealbum', array(
            'message' => $validate,
            'error' => $validateError
        ));
    }

    public function imageuploadview() {

        session()->regenerate();
        $UserId = session('id');
        $Album = DB::table('AlbumDetails')->select('Name')->where('UserId', session('id'))->get();
        return view('imageUpload/imageuploadview', array(
            'Album' => $Album));
    }

    public function imageupload() {
        session()->regenerate();
        $UserId = session('id');
        $image = Input::file('imageupload');
        $album = Input::get('albumname');
        $path = 'directory/' . $UserId . "/" . $album . "/";
        $fileName = Input::file('imageupload')->getClientOriginalName();
        if (Input::file('imageupload')->move($path, $fileName)) {
            return view('imageUpload/userLogin', array(
                'message' => 'Image uploaded Successfully'
            ));
        } else {
            return view('imageUpload/userLogin', array(
                'error' => 'Image could not be uploaded'
            ));
        }
    }

    public function viewalbum($name) {

        session()->regenerate();
        $UserId = session('id');
        $path = 'directory/' . $UserId . "/" . $name;
        $images = File::files($path);
        // if ($images) {

        return view('imageUpload/viewimage', array(
            'images' => $images
        ));
        //}
    }

    public function deletealbum($name) {

        session()->regenerate();
        $UserId = session('id');
        $path = 'directory/' . $UserId . "/" . $name;
        $Album = DB::table('AlbumDetails')->where('UserId', $UserId)->where("Name", $name)->delete();
        $delete = File::deleteDirectory($path);
        return Redirect::route('albums');
    }

    public function imagedelete($name) {

        $imagename = explode(",", $name);
        $imagepath = implode("/", $imagename);
        $image = File::delete($imagepath);
        $array = explode("/", $imagepath);
        $length = count($array);
        $length = $length - 2;
        $album = $array[$length];
        return Redirect::route('viewalbum', ['name' => $album]);
    }

    public function editalbum($name) {

        return view('imageUpload/editalbum', array(
            'albumname' => $name
        ));
    }

    public function editalbumname() {

        session()->regenerate();
        $UserId = session('id');
        $previousname = Input::get('previousname');
        $newname = Input::get('albumName');
        $description = Input::get('albumDesc');
        $path = 'directory/' . $UserId . "/" . $previousname;
        $newpath = 'directory/' . $UserId . "/" . $newname;
        if ($previousname != $newname) {
            $images = File::files($path);
            File::makeDirectory($newpath);
            foreach ($images as $value => $key) {
                $array = explode("/", $key);
                $x = count($array);
                $x = $x - 1;
                File::move($key, $newpath . "/" . $array[$x]);
            }
            File::deleteDirectory($path);
            DB::table('AlbumDetails')
                    ->where('UserId', $UserId)
                    ->where('Name', $previousname)
                    ->update(['Name' => $newname,
                        'Desc' => $description]);
            return Redirect::route('albums');
        } else {

            DB::table('AlbumDetails')
                    ->where('UserId', $UserId)
                    ->where('Name', $previousname)
                    ->update(['Desc' => $description]);
            return Redirect::route('albums');
        }
    }

    public function hai() {

        $array = explode("/", 'hello/hai/how/are/you');
        print_r($array);
        $x = count($array);
        $x = $x - 2;
        echo $array[$x];
        $path = 'directory/' . "1/myalbum";
        $newpath = 'directory/' . "1/myalbum2/";
        $images = File::files($path);
        print_r($images);
    }

}

?>
