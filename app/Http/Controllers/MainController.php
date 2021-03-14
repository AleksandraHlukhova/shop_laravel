<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class MainController extends Controller
{
    /**
     * show home
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }

    /**
     * show categories
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function categories()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    /**
     * show category
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', [
            'category' => $category
        ]);
    }

    /**
     * show product
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function product($id)
    {
        $product = Product::find($id);
        return view('product', ['product' => $product]);
    }

}
