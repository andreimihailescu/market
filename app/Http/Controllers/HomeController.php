<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
    	$products = Product::getAll()->toArray();

    	$products = array_merge($products, $products);
    	$products = array_merge($products, $products);
    	$products = array_merge($products, $products);

    	foreach($products as &$product){
    		$product = (object)$product;
		}

        return view('home', compact('products'));
    }
}
