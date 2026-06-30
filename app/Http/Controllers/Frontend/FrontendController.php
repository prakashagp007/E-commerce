<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class FrontendController extends Controller
{
    //

    public function home(){
        $data = Product::latest()->get();
        return view('frontend.home.home', compact('data'));
    }
}
