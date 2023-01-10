<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Post;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brands(){
        $brands = Brand::all();
        $prooduct_categories = ProductCategory::all();
        $posts = Post::all();
        return response()
            ->json(['success' => '1',
                'product_categories' => $prooduct_categories,
                'brands' => $brands,
                'posts' => $posts]);
    }

}
