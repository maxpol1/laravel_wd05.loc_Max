<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index(Request $request){

        session()->put('test', 'lc hdkfvb');
        session()->push('test2', 'skv');

        dump(session()->all());

        $catalogProduct = Product::where('active', 1)
            ->latest()
            ->limit(12)
            ->with('category')
            ->get();
//        dd($catalogProduct);
            $categories = Category::withCount('products')->get();
        return view('site.store', compact('catalogProduct', 'categories'));

    }

}
