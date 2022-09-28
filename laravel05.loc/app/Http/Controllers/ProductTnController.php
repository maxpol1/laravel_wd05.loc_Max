<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductTnController extends Controller
{
    public function product(){

        $reviewProduct = Product::where('active', 2)
            ->limit(1)
            ->latest()
            ->get();
//dd($reviewProduct);
        return view('site.product', compact('reviewProduct'));
    }
}
