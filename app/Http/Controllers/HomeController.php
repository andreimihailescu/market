<?php

namespace App\Http\Controllers;

use App\Jobs\ClearProductsJob;
use App\Product;
use App\Providers\ProductServiceInterface;
use Illuminate\Http\Request;

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
