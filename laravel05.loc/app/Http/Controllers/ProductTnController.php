<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductTnController extends Controller
{
    public function product(){

        $reviewProduct = Product::where('active', 1)
            ->where('category_id', $product_id)
            ->limit(1)
            ->latest()
            ->get();
//dd($reviewProduct);
        return view('site.product', compact('reviewProduct'));
//        return $this->hasMany(Product::class, 'products', 'category_id', 'product_id');
    }
}
