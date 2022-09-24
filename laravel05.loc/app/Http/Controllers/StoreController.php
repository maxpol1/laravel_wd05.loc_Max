<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index(){

        $catalogProduct = Product::where('active', 1)
            ->latest()
            ->limit(12)
            ->get();
//        dd($catalogProduct);

        return view('site.store', compact('catalogProduct'));

    }
}
