<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
//        $arr = ['h1' => 'Hello world', 'h2' => '<h2>hello laraval</h2>'];
        return view('admin.dashboard');
    }

}
