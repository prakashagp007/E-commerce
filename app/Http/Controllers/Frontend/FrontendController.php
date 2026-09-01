<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    //

    // FrontendController@home
public function home()
{
    $categories = Category::all();
    $categoryId = request('category');

    $data = Product::when($categoryId, function($q) use ($categoryId) {
        return $q->where('category_id', $categoryId);
    })->get();

    return view('frontend.home.home', compact('data', 'categories'));
}
}
