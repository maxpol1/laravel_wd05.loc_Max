<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function Sodium\add;

class SiteController extends Controller
{
    public function __invoke()
    {
//        select * from products where active = 1
//        and category_id = 1
//        limit 10
//        order by id desc

        $latestProducts = Product::query()
            ->select()
            ->limit(10)
            ->where('active', 1)
            ->latest()
            ->get();

        return view('site.index', compact('latestProducts'));
    }
}
