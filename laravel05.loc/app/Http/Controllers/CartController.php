<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function getCart(){
       $cart = session()->get('cart', []);
       $products_ids = array_keys($cart);
       $products = Product::whereIn('id', $products_ids)
           ->get()
           ->keyBy('id');
       dd($products);
//       dump($cart);

   }
   public function addToCart(Request $request){
       //dd($request->all());
       $cart = session()->get('cart', []);
       $product_id = $request->input('product');

       if(isset($cart[$product_id])){
           $cart[$product_id] +=1;
       }else{
           $cart[$product_id] =1;
       }
       session()->put('cart', $cart);
       return to_route('cart');

//       dd($request->all());

   }
}
