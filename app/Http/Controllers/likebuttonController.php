<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Usermodel;

class likebuttonController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function likebutton($name) {

        $article = DB::table('likes')->get();
        $user = DB::table('userlikes')->where('name', $name)->get();
        if (!$user) {
            DB::table('userlikes')->insert(['name' => $name]);
            $user = DB::table('userlikes')->where('name', $name)->get();
            $userarray = json_decode(json_encode($user), true);
        } else {

            $userarray = json_decode(json_encode($user), true);
        }

        $articlearray = json_decode(json_encode($article), true);

        return view('likebutton/like', ['article' => $articlearray, 'user' => $userarray, 'name' => $name]);
    }

    public function like() {
        
    }

    public function shoppingcart() {

        $values = DB::table('shoppingcart')->get();
        $product = json_decode(json_encode($values), true);
        return view('shoppingcart/shoppingcart', ['product' => $product]);
    }

    public function addcart() {

        $id = Input::get('value');
        if (DB::table('Tempcart')->where('productid', $id)->get()) {

            echo "Product already added to cart";
        } else {

            DB::table('Tempcart')->insert(['productid' => $id, 'quantity' => 1]);
        }
    }

    public function checkcart() {

        $result = DB::table('Tempcart')->count('productid');
        return $result;
    }

    public function checkout() {

        $resultquery = DB::table('shoppingcart')
                ->join('Tempcart', 'shoppingcart.Id', '=', 'Tempcart.productid')
                ->select('shoppingcart.Id','shoppingcart.Name', 'shoppingcart.Description', 'Tempcart.quantity','shoppingcart.Price')
                ->get();

        $product = json_decode(json_encode($resultquery), true);
        return view('shoppingcart/cartview', ['product' => $product]);
    }
    
    public function addproduct($id){
        
        
            DB::table('Tempcart')->where('productid','=',$id)->increment('quantity');
            $obj=new likebuttonController();
            return $obj->checkout();
    }
    
    public function deductproduct($id){
        
            DB::table('Tempcart')->where('productid','=',$id)->decrement('quantity');
            $obj=new likebuttonController();
            return $obj->checkout();
    }

    public function deleteproduct($id){
        
        DB::table('Tempcart')->where('productid','=',$id)->delete();
            $obj=new likebuttonController();
            return $obj->checkout();
    }
    public function payment(){
        $price=Input::get('price');
        return view('shoppingcart/paymentview', ['price' => $price]);
    }

    public function paid(){
        $price=Input::get('price');
        $name=Input::get('name');
        $account=Input::get('number');
        DB::table('Tempcart')->truncate();
        return view('shoppingcart/paidview', ['price' => $price,'name'=>$name,'account'=>$account]);
    }
    }

?>
