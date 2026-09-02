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
    $categoryId = request('category') ?? request('id'); // both support

    $data = Product::when($categoryId, function($q) use ($categoryId) {
        return $q->where('category_id', $categoryId);
    })->where('status', 1)->get();

    // Active category highlight ku
    $activeCategory = $categoryId ? Category::find($categoryId) : null;

    return view('frontend.home.home', compact('data', 'categories', 'activeCategory'));
}

public function categoryPage($id)
{
    $category = Category::findOrFail($id);
    $products = Product::where('category_id', $id)->get(); // status filter remove panninen

    // Debug — products irukka nu confirm pannu
    // dd($products);

    return view('frontend.category.category', compact('category', 'products'));
}
}
