<?php

use Illuminate\Database\Seeder;
use \App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'Test Product';
        $product->description = 'Product description';
        $product->type = 'laptop';
        $product->stock = 10;
        $product->price = 10;
        $product->save();
    }
}
