<?php

namespace App\Http\Controllers;

use App\Providers\ProductServiceInterface;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(ProductServiceInterface $product)
    {
    	$products = $product->getAll();

        return view('home', compact('products'));
    }
}
