<?php

namespace App\Http\Controllers;
use App\Models\{product,category};

use Illuminate\Http\Request;

class productController extends Controller
{  
    // get products and categoreis for the index page of the e-commerce
    public function get_product(){

        $products = product::all();
        $category = category::all();
        return view('index',compact('products','category'));
        
    }


     // get products and categoreis for the products page of the e-commerce
      public function get_products(){

        $products= product::with('category')->orderBy('id','desc')->get();
        return view('products',compact('products'));
    }


   
}
