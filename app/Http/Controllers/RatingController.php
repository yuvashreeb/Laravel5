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

class RatingController extends BaseController {

    public function index() {
        //return View('WebsiteRate');
        $object = new RatingController();
        $limit = 6;
        $article = $object->get_articles($limit);
        if (count($article) == 0) {
            echo "sorry no articles found";
        } else {


            return View('/layouts/rate', ['Result' => $article, 'limit' => $limit]);
        }
    }

    public function get_articles($limit) {

        $limit = (int) $limit;
        $article = array();
        $data = DB::table('Rating')->select('Id', 'Title', 'RateTotal', 'RateCount')->take($limit)->get();

        $content = json_decode(json_encode($data), true);

        return $content;
    }

    public function rating($item, $rating, $limit) {
        $rate_system = new RatingController();
        $item_exists = $rate_system->items_rate('Rating', $item);
        if (!empty($item) && !empty($rating) && $item_exists == true && ($rating >= 1 && $rating <= $limit))
            $rate_exists = $rate_system->rate('Rating', $item, $rating);
        return $rate_system->index();
    }

    public function items_rate($table, $item) {
        $item = (int) $item;
        $item_result = DB::table($table)->where('Id', $item)->count("Id") ? true : false;
        return $item_result;
    }

    public function rate($table, $item, $rating) {
        $item = (int) $item;
        $rating = (int) $rating;
        $rating_result = DB::table('Rating')->where('Id', $item)->increment('RateCount', 1, ['RateTotal' => $rating]);

        return $rating_result;
    }

}
