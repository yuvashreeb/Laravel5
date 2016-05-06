<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class SearchController extends BaseController {

    public function index() {
        return View('/layouts/engine');
    }

    public function searchEngine() {
        $input = Input::All();
        if (isset($input['keywords'])) {
            $suffix = "";
            $keywords = trim($input['keywords']);
            $errors = array();
            $object = new SearchController();
            if (empty($keywords)) {
                $errors[] = 'Please enter a search term';
            } else if (strlen($keywords) < 3) {
                $errors[] = 'Your search term must be three or more characters';
            } else if ($object->search_results($keywords) === false) {
                $errors[] = 'Your search for ' . $keywords . ' returned no result';
            }
            if (empty($errors)) {
                $results = $object->search_results($keywords);

                $results_num = count($results);

                $suffix = ($results_num != 1) ? 's' : '';

                echo '<p>Your search for <strong>' . $keywords . '</strong> returned <strong>' . $results_num . '</strong> result' . $suffix . '</p>';

                foreach ($results as $result) {
                    echo '<p><strong>' . $result['title'] . '</strong> <br>' . $result['description'] . '... <br> <a href="' . $result['url'] . '" target="_blank">' . $result['url'] . '<a>';
                }
            } else {
                return view('/layouts/engine', ['Error' => $errors]);
            }
        }
    }

    public function search_results($keywords) {
        $returned_results = array();
        $where = "";
        $keywords = preg_split('/[\s]+/', $keywords);
        $total_keywords = count($keywords);
        foreach ($keywords as $key => $keyword) {
            $where.="`keywords` LIKE '%$keyword%'";
            if ($key != ($total_keywords - 1)) {
                $where.="  AND";
            }
        }

        $result = DB::select(DB::Raw("SELECT `Title`,LEFT(`Description`,70) as`Description`,`Url` FROM `Article` WHERE $where"));
        //print_r($result);
        $result = json_decode(json_encode($result), true);
        $result_rows = ($result) ? count($result) : 0;
        if ($result_rows === 0)
            return false;
        else {
            foreach ($result as $key => $value) {
                $returned_results[] = array(
                    'title' => $value['Title'],
                    'description' => $value['Description'],
                    'url' => $value['Url'],
                );
            }
        }
        return $returned_results;
    }

}
