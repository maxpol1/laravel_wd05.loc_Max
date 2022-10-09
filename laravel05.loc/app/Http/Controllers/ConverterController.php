<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConverterController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
   {
        $response = Http::get( 'https://www.nbrb.by/api/exrates/currencies');
        $currencies = $response->json();
   }
}
