<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(Request $request){
        $products = Product::where('device_id',$request["device_id"])->with("vendor")->get();
        return $products;
    }
}
